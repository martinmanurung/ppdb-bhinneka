<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Student Routes
Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/berkas', [StudentController::class, 'showBerkas'])->name('berkas');

    // Biodata Form
    Route::get('/form/biodata', [StudentController::class, 'showBiodataForm'])->name('form.biodata');
    Route::post('/form/biodata', [StudentController::class, 'storeBiodata']);

    // Parents Form
    Route::get('/form/parents', [StudentController::class, 'showParentsForm'])->name('form.parents');
    Route::post('/form/parents', [StudentController::class, 'storeParents']);

    // Konfirmasi & Submit Formulir
    Route::get('/form/konfirmasi', [StudentController::class, 'showKonfirmasiForm'])->name('form.konfirmasi');
    Route::post('/form/submit', [StudentController::class, 'submitRegistration'])->name('form.submit');

    Route::get('/surat-pernyataan', [StudentController::class, 'downloadSuratPernyataan'])->name('surat-pernyataan');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Applicants Management
    Route::get('/applicants', [AdminController::class, 'applicants'])->name('applicants.index');
    Route::get('/applicants/{pendaftaran}', [AdminController::class, 'showApplicant'])->name('applicants.show');
    Route::get('/applicants/{pendaftaran}/print', [AdminController::class, 'printForm'])->name('applicants.print');
    Route::put('/applicants/{pendaftaran}/status', [AdminController::class, 'updateVerificationStatus'])
        ->name('applicants.update-status');

    Route::get('/export', [AdminController::class, 'exportForm'])->name('export');
    Route::get('/export/download', [AdminController::class, 'export'])->name('export.download');
});

