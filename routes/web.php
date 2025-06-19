<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/add', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::get('/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    
});