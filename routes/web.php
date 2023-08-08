<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonorsCategoryController;
use App\Http\Controllers\ExpensesCategoryController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\IsExpensesController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth
Route::get('/', [AuthController::class, 'index'])->name('login');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Donors
Route::get('/donors-category', [DonorsCategoryController::class, 'index']);
Route::get('/donors-category/create', [DonorsCategoryController::class, 'create']);
Route::post('/donors-category/create', [DonorsCategoryController::class, 'store']);
Route::get('/donors-category/{id}/edit', [DonorsCategoryController::class, 'edit']);

// incomes
Route::get('/incomes', [IncomesController::class, 'index']);
Route::get('/incomes/create', [IncomesController::class, 'create']);
Route::get('/incomes/{id}/edit', [IncomesController::class, 'edit']);

// Expenses
Route::get('/expenses-category', [ExpensesCategoryController::class, 'index']);
Route::get('/expenses-category/{id}/edit', [ExpensesCategoryController::class, 'edit']);

// IsExpenses
Route::get('/isexpense', [IsExpensesController::class, 'index']);
Route::get('/isexpense/create', [IsExpensesController::class, 'create']);
Route::get('/isexpense/{id}/edit', [IsExpensesController::class, 'edit']);

// Report
Route::get('/report', [ReportController::class, 'index']);
