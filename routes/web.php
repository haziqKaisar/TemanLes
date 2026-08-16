<?php

use Illuminate\Support\Facades\Route;

// Publik
Route::livewire('/', 'pages::student.tutor-marketplace')->name('home');
Route::livewire('/tutors/{tutor}/booking', 'pages::student.booking-wizard')->name('booking.wizard');

// Auth bawaan (Breeze/Fortify)
require __DIR__ . '/auth.php';

// STUDENT
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        $orders = auth()->user()->ordersAsStudent()->with(['tutor.user', 'tutorSubject.subject'])->latest()->paginate(10);
        return view('student.dashboard', compact('orders'));
    })->name('dashboard');
});

// TEACHER
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        $tutor = auth()->user()->tutor;
        $wallet = $tutor?->wallet;
        $orders = $tutor?->orders()->with('student')->latest()->paginate(10);
        return view('teacher.dashboard', compact('tutor', 'wallet', 'orders'));
    })->name('dashboard');

    Route::livewire('/withdraw', 'pages::teacher.withdraw-form')->name('withdraw');
});

// ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::livewire('/payments', 'pages::admin.payment-approval')->name('payments');
    Route::livewire('/payouts', 'pages::admin.payout-approval')->name('payouts');
});
