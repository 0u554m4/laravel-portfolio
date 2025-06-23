<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ContactController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('language/{locale}', [LocalizationController::class, 'setLocale'])->name('language.set');

// Debug route to check current locale
Route::middleware(['web'])->get('/debug-locale', function() {
    return [
        'session_locale' => session('locale'),
        'app_locale' => app()->getLocale(),
        'session_id' => session()->getId()
    ];
});
