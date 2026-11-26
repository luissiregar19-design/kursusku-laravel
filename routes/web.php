<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Route lama (tetap publik, navigasi tetap bisa diakses)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/lifecycle', 'lifecycle')->name('lifecycle');
Route::view('/readme-git', 'readme-git')->name('readme-git');
Route::view('/route-controller-blade', 'route-controller-blade')->name('route-controller-blade');
Route::resource('courses', CourseController::class);
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

Route::get('/pendaftaran', function () {
    $courses = [
        1 => ['name' => 'Web Dasar'],
        2 => ['name' => 'PHP Dasar'],
        3 => ['name' => 'Laravel Dasar'],
    ];

    return view('enrollments.pendaftaran-lama', compact('courses'));
})->name('pendaftaran-lama');

Route::post('/pendaftaran/preview', function (Request $request) {
    $request->validate([
        'name'      => ['required', 'string', 'min:3', 'max:100'],
        'email'     => ['required', 'email'],
        'course_id' => ['required', 'integer'],
    ]);

    return back()
        ->with('success', 'Form lolos validasi. Database ditambahkan pada pertemuan berikutnya.')
        ->withInput();
})->name('enrollments.preview');

Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => ['course' => 'Web Dasar',     'remaining' => 12],
        2 => ['course' => 'PHP Dasar',     'remaining' => 8],
        3 => ['course' => 'Laravel Dasar', 'remaining' => 4],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);
})->name('courses.availability');

/*
|--------------------------------------------------------------------------
| Auth: hanya untuk tamu (belum login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendReset'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Auth: hanya untuk user yang sudah login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});