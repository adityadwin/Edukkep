<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UpdatesController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/updates', [UpdatesController::class, 'index'])->name('updates');
Route::get('/updates/{id}', [UpdatesController::class, 'show'])->name('updates.show');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/media/{id}', [MediaController::class, 'show'])->name('media.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/appointment', [HomeController::class, 'appointment'])->name('appointment');
Route::post('/enquiry', [HomeController::class, 'enquiry'])->name('enquiry');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/search', [HomeController::class, 'search'])->name('search');