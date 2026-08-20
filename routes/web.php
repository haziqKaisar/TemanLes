<?php

use App\Http\Controllers\Admin\PaymentApprovalController;
use App\Http\Controllers\Admin\PayoutApprovalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Teacher\WithdrawController;
use App\Http\Controllers\TutorMarketplaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TutorMarketplaceController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';


Route::get('/', [TutorMarketplaceController::class, 'index'])->name('home');

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

// ... sisanya (booking, payment, student, teacher, admin group) tetap sama

Route::middleware('auth')->group(function () {
    Route::prefix('tutors/{tutor}/booking')->name('booking.')->group(function () {
        Route::get('/step-1', [BookingController::class, 'step1'])->name('step1');
        Route::post('/step-1', [BookingController::class, 'storeStep1'])->name('step1.store');
        Route::get('/step-2', [BookingController::class, 'step2'])->name('step2');
        Route::post('/step-2', [BookingController::class, 'storeStep2'])->name('step2.store');
        Route::get('/step-3', [BookingController::class, 'step3'])->name('step3');
        Route::post('/confirm', [BookingController::class, 'confirm'])->name('confirm');
    });

    Route::get('/orders/{order}/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/orders/{order}/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/orders/{order}/success', [PaymentController::class, 'success'])->name('payment.success');
});

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        $orders = auth()->user()->ordersAsStudent()->with(['tutor.user', 'tutorSubject.subject'])->latest()->paginate(10);
        return view('student.dashboard', compact('orders'));
    })->name('dashboard');
});

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        $tutor = auth()->user()->tutor;
        $wallet = $tutor?->wallet;
        $orders = $tutor?->orders()->with('student')->latest()->paginate(10);
        return view('teacher.dashboard', compact('tutor', 'wallet', 'orders'));
    })->name('dashboard');

    Route::get('/withdraw', [WithdrawController::class, 'create'])->name('withdraw');
    Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/payments', [PaymentApprovalController::class, 'index'])->name('payments');
    Route::get('/payments/{payment}', [PaymentApprovalController::class, 'show'])->name('payments.show');
    Route::post('/payments/{payment}/approve', [PaymentApprovalController::class, 'approve'])->name('payments.approve');
    Route::post('/payments/{payment}/reject', [PaymentApprovalController::class, 'reject'])->name('payments.reject');

    Route::get('/payouts', [PayoutApprovalController::class, 'index'])->name('payouts');
    Route::post('/payouts/{payout}/approve', [PayoutApprovalController::class, 'approve'])->name('payouts.approve');
    Route::post('/payouts/{payout}/reject', [PayoutApprovalController::class, 'reject'])->name('payouts.reject');
});
