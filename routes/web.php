<?php

use App\Livewire\StudentDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', App\Livewire\CourseCatalog::class)->name('home');
Route::get('/courses/{course}', App\Livewire\CourseDetails::class)->name('courses.show');

// Student routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', StudentDashboard::class)->name('student.dashboard');
});

// Auth routes
Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
