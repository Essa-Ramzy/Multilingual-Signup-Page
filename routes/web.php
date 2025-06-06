<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegistrationController::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.submit');
Route::get('/success', [RegistrationController::class, 'showSuccess'])->name('registration.success');

// AJAX routes
Route::post('/validate-whatsapp', [RegistrationController::class, 'validateWhatsApp'])->name('validate.whatsapp');
Route::post('/check-username', [RegistrationController::class, 'checkUsername'])->name('check.username');

// Language switch route
Route::get('/language/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');
