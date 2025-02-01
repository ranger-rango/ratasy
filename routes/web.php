<?php

use App\Http\Controllers\DailyLedgerController;
use App\Http\Controllers\LoggingController;
use App\Http\Controllers\OperatingExpenseController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route::get('/login', function() 
// {
//     return view('auth.login');
// });

// Route::get('/register', function() 
// {
//     return view('auth.register');
// });

// Route::get('/log', function()
// {
//     return view('logs.create');
// });

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/logs', [LoggingController::class, 'create'])->middleware(['auth']);
Route::post('/logs', [LoggingController::class, 'store'])->middleware(['auth']);

Route::get('/reports', [ReportsController::class, 'create'])->middleware(['auth']);
Route::post('/reports', [ReportsController::class, 'store'])->middleware(['auth']);
// Route::get('/reports/show', [ReportsController::class, 'show'])->name('reports.show');

Route::get('/ledgers', [DailyLedgerController::class, 'create'])->middleware(['auth']);
Route::post('/ledgers', [DailyLedgerController::class, 'store'])->middleware(['auth']);

Route::get('/expenses', [OperatingExpenseController::class, 'create'])->middleware(['auth']);//->name('expenses.create');
Route::post('/expenses', [OperatingExpenseController::class, 'store'])->middleware(['auth']);

