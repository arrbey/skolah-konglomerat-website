<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\KeunggulanController;
use App\Http\Controllers\Admin\MasalahController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('/contact', [LandingPageController::class, 'sendContact'])->name('contact.send');

Route::get('/dashboard', fn () => redirect()->route('admin.dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');
    Route::get('/masalah', [MasalahController::class, 'edit'])->name('masalah.edit');
    Route::put('/masalah', [MasalahController::class, 'update'])->name('masalah.update');
    Route::get('/kenapa', [KeunggulanController::class, 'edit'])->name('kenapa.edit');
    Route::put('/kenapa', [KeunggulanController::class, 'update'])->name('kenapa.update');
    Route::resource('training', TrainingController::class)->except('show')->parameters(['training' => 'training']);
    Route::patch('training/{training}/toggle', [TrainingController::class, 'toggle'])->name('training.toggle');
    Route::resource('faq', FaqController::class)->except('show');
    Route::patch('faq/{faq}/toggle', [FaqController::class, 'toggle'])->name('faq.toggle');
    Route::get('/contact', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/footer', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/footer', [FooterController::class, 'update'])->name('footer.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
