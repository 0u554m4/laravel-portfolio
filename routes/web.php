<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('language/{locale}', [LocalizationController::class, 'setLocale'])->name('language.set');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/contact/{id}', [AdminController::class, 'showContact'])->name('admin.contact.show');
        Route::patch('/contact/{id}/read', [AdminController::class, 'markAsRead'])->name('admin.contact.read');
        Route::patch('/contact/{id}/unread', [AdminController::class, 'markAsUnread'])->name('admin.contact.unread');
        Route::delete('/contact/{id}', [AdminController::class, 'deleteContact'])->name('admin.contact.delete');
    });
});

// Debug route to check current locale
Route::middleware(['web'])->get('/debug-locale', function() {
    return [
        'session_locale' => session('locale'),
        'app_locale' => app()->getLocale(),
        'session_id' => session()->getId()
    ];
});

// Test email route (remove in production)
Route::get('/test-email', function() {
    try {
        $contactData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'subject' => 'Test Email',
            'message' => 'This is a test email from the portfolio contact form.'
        ];
        
        \Mail::to('oussahmane@gmail.com')->send(new \App\Mail\ContactMail($contactData));
        return 'Test email sent successfully! Check your Gmail inbox.';
    } catch (\Exception $e) {
        return 'Error sending email: ' . $e->getMessage();
    }
});
