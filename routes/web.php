<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cegah akses login jika sudah login
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

// Dashboard umum (untuk tamu)
Route::middleware(['auth'])->group(function () {
    Route::get('/tamu', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Gunakan Middleware Role
Route::middleware('auth')->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin.index');
        })->name('admin.dashboard');
    });

    // Route::middleware(['role:tamu'])->group(function () {
    //     Route::get('/tamu/dashboard', function () {
    //         return view('tamu.index');
    //     })->name('tamu.dashboard');
    // });
});


require __DIR__.'/auth.php';
