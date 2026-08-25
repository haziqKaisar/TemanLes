<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Payout;
use App\Models\Tutor;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $today = today();
        $weekStart = now()->startOfWeek();

        $bookingTotals = Order::query()
            ->whereBetween('scheduled_date', [$weekStart->toDateString(), $weekStart->copy()->addDays(6)->toDateString()])
            ->selectRaw('scheduled_date, count(*) as total')
            ->groupBy('scheduled_date')
            ->pluck('total', 'scheduled_date');

        $weeklyBookings = collect(range(0, 6))->map(function (int $day) use ($weekStart, $bookingTotals) {
            $date = $weekStart->copy()->addDays($day);

            return [
                'label' => $date->translatedFormat('D'),
                'total' => (int) ($bookingTotals[$date->toDateString()] ?? 0),
            ];
        });

        $paymentActivities = Payment::with(['order.student'])
            ->latest()
            ->take(3)
            ->get()
            ->map(fn (Payment $payment) => [
                'type' => 'payment',
                'title' => $payment->status === 'pending' ? 'Pembayaran menunggu verifikasi' : 'Pembayaran diperbarui',
                'description' => $payment->order?->student?->name . ' · ' . $payment->order?->order_code,
                'amount' => $payment->amount,
                'created_at' => $payment->created_at,
            ]);

        $payoutActivities = Payout::with(['tutor.user'])
            ->latest()
            ->take(3)
            ->get()
            ->map(fn (Payout $payout) => [
                'type' => 'payout',
                'title' => $payout->status === 'pending' ? 'Permintaan pencairan' : 'Pencairan diperbarui',
                'description' => $payout->tutor?->user?->name,
                'amount' => $payout->amount,
                'created_at' => $payout->created_at,
            ]);

        $activities = $paymentActivities->concat($payoutActivities)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();

        return view('admin.dashboard', [
            'stats' => [
                'activeTutors' => Tutor::where('is_active', true)->count(),
                'students' => User::where('role', 'student')->count(),
                'todayBookings' => Order::whereDate('scheduled_date', $today)->count(),
                'monthlyRevenue' => Payment::where('status', 'approved')
                    ->whereBetween('verified_at', [now()->startOfMonth(), now()->endOfMonth()])
                    ->sum('amount'),
            ],
            'pendingPayments' => Payment::where('status', 'pending')->count(),
            'pendingPayouts' => Payout::where('status', 'pending')->count(),
            'weeklyBookings' => $weeklyBookings,
            'activities' => $activities,
        ]);
    }
}
