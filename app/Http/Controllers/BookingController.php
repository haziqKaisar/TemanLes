<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function step1(Tutor $tutor)
{
    abort_unless($tutor->verification_status === 'verified', 404);
    $subjects = $tutor->tutorSubjects()->where('is_active', true)->with('subject')->get();
    $availabilities = $tutor->availabilities()->where('is_active', true)->orderBy('day_of_week')->get();

    return view('booking.step1', compact('tutor', 'subjects', 'availabilities'));
}

    public function storeStep1(Request $request, Tutor $tutor)
    {
        $data = $request->validate([
            'tutor_subject_id' => 'required|exists:tutor_subjects,id',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'scheduled_time' => 'required',
            'duration_minutes' => 'required|integer|in:60,90,120',
        ]);

        $dayOfWeek = (int) date('w', strtotime($data['scheduled_date']));
        $available = $tutor->availabilities()
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->where('start_time', '<=', $data['scheduled_time'])
            ->where('end_time', '>=', $data['scheduled_time'])
            ->exists();

        if (! $available) {
            return back()->withInput()->withErrors(['scheduled_time' => 'Guru tidak tersedia pada hari/jam tersebut.']);
        }

        session(['booking' => $data]);

        return redirect()->route('booking.step2', $tutor);
    }

    public function step2(Tutor $tutor)
    {
        abort_unless(session('booking'), 400, 'Silakan mulai booking dari awal.');
        return view('booking.step2', compact('tutor'));
    }

    public function storeStep2(Request $request, Tutor $tutor)
    {
        $rules = ['teaching_mode' => 'required|in:online,offline'];

        if ($request->teaching_mode === 'offline') {
            $rules += [
                'location_lat' => 'required|numeric|between:-90,90',
                'location_lng' => 'required|numeric|between:-180,180',
                'location_address' => 'required|string|max:500',
                'location_note' => 'nullable|string|max:255',
            ];
        }

        $data = $request->validate($rules);

        session(['booking' => array_merge(session('booking', []), $data)]);

        return redirect()->route('booking.step3', $tutor);
    }

    public function step3(Tutor $tutor)
    {
        $bookingData = session('booking');
        abort_unless($bookingData, 400, 'Silakan mulai booking dari awal.');

        $tutorSubject = $tutor->tutorSubjects()->with('subject')->findOrFail($bookingData['tutor_subject_id']);
        $total = round($tutorSubject->price_per_hour * ($bookingData['duration_minutes'] / 60), 2);

        return view('booking.step3', compact('tutor', 'tutorSubject', 'bookingData', 'total'));
    }

    public function confirm(Tutor $tutor)
    {
        $bookingData = session('booking');
        abort_unless($bookingData, 400, 'Silakan mulai booking dari awal.');

        $tutorSubject = $tutor->tutorSubjects()->findOrFail($bookingData['tutor_subject_id']);

        $order = new Order([
            'student_id' => Auth::id(),
            'tutor_id' => $tutor->id,
            'tutor_subject_id' => $tutorSubject->id,
            'teaching_mode' => $bookingData['teaching_mode'],
            'scheduled_date' => $bookingData['scheduled_date'],
            'scheduled_time' => $bookingData['scheduled_time'],
            'duration_minutes' => $bookingData['duration_minutes'],
            'location_lat' => $bookingData['location_lat'] ?? null,
            'location_lng' => $bookingData['location_lng'] ?? null,
            'location_address' => $bookingData['location_address'] ?? null,
            'location_note' => $bookingData['location_note'] ?? null,
            'status' => 'pending_payment',
        ]);

        $order->calculatePricing($tutorSubject->price_per_hour, $bookingData['duration_minutes'], 10);
        $order->save();

        session()->forget('booking');

        return redirect()->route('payment.create', $order);
    }
}
