<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('auth.registration');
Route::post('registration', [AuthController::class, 'registrationPost'])->name('registration.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/forms', [FormController::class, 'index'])->name('form.index');
    Route::get('/forms/create', [FormController::class, 'create'])->name('form.create');
    Route::post('/forms', [FormController::class, 'store'])->name('form.store');
    Route::get('/forms/{form}/edit', [FormController::class, 'edit'])->name('form.edit');
    Route::put('/forms/{form}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/forms/{form}', [FormController::class, 'destroy'])->name('form.destroy');
});