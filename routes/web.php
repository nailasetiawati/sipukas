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
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'authenticated']);
Route::get('/logout', [AuthController::class, 'logout']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Donors
Route::get('/donors-category', [DonorsCategoryController::class, 'index'])->middleware('auth');
Route::get('/donors-category/create', [DonorsCategoryController::class, 'create'])->middleware('auth');
Route::post('/donors-category/create', [DonorsCategoryController::class, 'store'])->middleware('auth');
Route::get('/donors-category/{id}/edit', [DonorsCategoryController::class, 'edit'])->middleware('auth');
Route::post('/donors-category/{id}/edit', [DonorsCategoryController::class, 'update'])->middleware('auth');
Route::get('/donors-category/{id}/delete', [DonorsCategoryController::class, 'delete'])->name('category_delete')->middleware('auth');

// incomes
Route::get('/incomes', [IncomesController::class, 'index'])->middleware('auth');
Route::get('/incomes/create', [IncomesController::class, 'create'])->middleware('auth');
Route::post('/incomes/create', [IncomesController::class, 'store'])->middleware('auth');
Route::get('/incomes/{id}/edit', [IncomesController::class, 'edit'])->middleware('auth');
Route::post('/incomes/{id}/edit', [IncomesController::class, 'update'])->middleware('auth');
Route::get('/incomes/{id}/delete', [IncomesController::class, 'delete'])->middleware('auth');

// Expenses
Route::get('/expenses-category', [ExpensesCategoryController::class, 'index'])->middleware('auth');
Route::get('/expenses-category/create', [ExpensesCategoryController::class, 'create'])->middleware('auth');
Route::post('/expenses-category/create', [ExpensesCategoryController::class, 'store'])->middleware('auth');
Route::get('/expenses-category/{id}/edit', [ExpensesCategoryController::class, 'edit'])->middleware('auth');
Route::post('/expenses-category/{id}/edit', [ExpensesCategoryController::class, 'update'])->middleware('auth');
Route::get('/expenses-category/{id}/delete', [ExpensesCategoryController::class, 'delete'])->middleware('auth');


// IsExpenses
Route::get('/isexpense', [IsExpensesController::class, 'index'])->middleware('auth');
Route::get('/isexpense/create', [IsExpensesController::class, 'create'])->middleware('auth');
Route::post('/isexpense/create', [IsExpensesController::class, 'store'])->middleware('auth');
Route::get('/isexpense/{id}/edit', [IsExpensesController::class, 'edit'])->middleware('auth');
Route::post('/isexpense/{id}/edit', [IsExpensesController::class, 'update'])->middleware('auth');
Route::get('/isexpense/{id}/delete', [IsExpensesController::class, 'destroy'])->middleware('auth');

// Report
Route::get('/report', [ReportController::class, 'index'])->middleware('auth');
