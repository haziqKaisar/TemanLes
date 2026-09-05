<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentApprovalController;
use App\Http\Controllers\Admin\PayoutApprovalController;
use App\Http\Controllers\Admin\TutorVerificationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Student\OrderController as StudentOrderController;
use App\Http\Controllers\Teacher\OrderController as TeacherOrderController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\ScheduleController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\WithdrawController;
use App\Http\Controllers\TutorMarketplaceController;
use Illuminate\Support\Facades\Route;

// ============================
// PUBLIK
// ============================
Route::get('/', [LandingController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';

Route::middleware('auth')->get('/dashboard', function () {
    $user = auth()->user();

    return match ($user->role) {
        'student' => redirect()->route('student.dashboard'),
        'teacher' => redirect()->route('teacher.dashboard'),
        'admin' => redirect()->route('admin.dashboard'),
        default => redirect()->route('home'),
    };
})->name('dashboard');

// ============================
// MARKETPLACE & BOOKING (wajib login)
// ============================
Route::middleware('auth')->group(function () {

    Route::get('/marketplace', [TutorMarketplaceController::class, 'index'])->name('marketplace');

    Route::prefix('tutors/{tutor}/booking')->name('booking.')->group(function () {
        Route::get('/step-1', [BookingController::class, 'step1'])->name('step1');
        Route::post('/step-1', [BookingController::class, 'storeStep1'])->name('step1.store');

        Route::get('/step-2', [BookingController::class, 'step2'])->name('step2');
        Route::post('/step-2', [BookingController::class, 'storeStep2'])->name('step2.store');

        Route::get('/step-3', [BookingController::class, 'step3'])->name('step3');
        Route::post('/confirm', [BookingController::class, 'confirm'])->name('confirm');
    });

    Route::prefix('orders/{order}')->name('payment.')->group(function () {
        Route::get('/payment', [PaymentController::class, 'create'])->name('create');
        Route::post('/payment', [PaymentController::class, 'store'])->name('store');
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
    });
});

// ============================
// STUDENT
// ============================
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        $orders = auth()->user()->ordersAsStudent()
            ->with(['tutor.user', 'tutorSubject.subject'])
            ->latest()
            ->paginate(10);

        return view('student.dashboard', compact('orders'));
    })->name('dashboard');

    Route::post('/orders/{order}/confirm', [StudentOrderController::class, 'confirm'])->name('orders.confirm');
});

// ============================
// TEACHER
// ============================
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        $tutor = auth()->user()->tutor;

        if (! $tutor || $tutor->verification_status !== 'verified') {
            return view('teacher.pending', compact('tutor'));
        }

        $wallet = $tutor->wallet;
        $orders = $tutor->orders()->with('student')->latest()->paginate(10);

        return view('teacher.dashboard', compact('tutor', 'wallet', 'orders'));
    })->name('dashboard');

    Route::post('/orders/{order}/confirm', [TeacherOrderController::class, 'confirm'])->name('orders.confirm');

    Route::middleware('tutor.verified')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
        Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
        Route::put('/subjects/{tutorSubject}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::delete('/subjects/{tutorSubject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

        Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
        Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
        Route::delete('/schedule/{tutorAvailability}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
        // PERUBAHAN: Menambahkan route update jadwal di bawah ini
        Route::put('/schedule/{tutorAvailability}', [ScheduleController::class, 'update'])->name('schedule.update');

        Route::get('/withdraw', [WithdrawController::class, 'create'])->name('withdraw');
        Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.store');
    });
});

// ============================
// ADMIN
// ============================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('payments')->name('payments')->group(function () {
        Route::get('/', [PaymentApprovalController::class, 'index'])->name('');
        Route::get('/{payment}', [PaymentApprovalController::class, 'show'])->name('.show');
        Route::get('/{payment}/proof', [PaymentApprovalController::class, 'proof'])->name('.proof');
        Route::post('/{payment}/approve', [PaymentApprovalController::class, 'approve'])->name('.approve');
        Route::post('/{payment}/reject', [PaymentApprovalController::class, 'reject'])->name('.reject');
    });

    Route::prefix('payouts')->name('payouts')->group(function () {
        Route::get('/', [PayoutApprovalController::class, 'index'])->name('');
        Route::post('/{payout}/approve', [PayoutApprovalController::class, 'approve'])->name('.approve');
        Route::post('/{payout}/reject', [PayoutApprovalController::class, 'reject'])->name('.reject');
    });

    Route::prefix('tutors')->name('tutors')->group(function () {
        Route::get('/', [TutorVerificationController::class, 'index'])->name('');
        Route::post('/{tutor}/approve', [TutorVerificationController::class, 'approve'])->name('.approve');
        Route::post('/{tutor}/reject', [TutorVerificationController::class, 'reject'])->name('.reject');
    });
}); 

//gaburttttt