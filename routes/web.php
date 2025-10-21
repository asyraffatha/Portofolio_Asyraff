<?php

use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PortofolioController::class, 'index'])->name('home');
Route::post('/contact', [PortofolioController::class, 'storeContact'])->name('contact.store');

// Admin routes
Route::get('/admin/contacts', [PortofolioController::class, 'adminContacts'])->name('admin.contacts');