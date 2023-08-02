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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/donors-category', [DonorsCategoryController::class, 'index']);
Route::get('/incomes', [IncomesController::class, 'index']);
Route::get('/expenses-category', [ExpensesCategoryController::class, 'index']);
Route::get('/isexpense', [IsExpensesController::class, 'index']);
Route::get('/report', [ReportController::class, 'index']);
Route::get('/donors-category/{id}/edit', [DonorsCategoryController::class, 'edit']);
Route::get('/expenses-category/{id}/edit', [ExpensesCategoryController::class, 'edit']);
Route::get('/incomes/{id}/edit', [IncomesController::class, 'edit']);
Route::get('/isexpense/{id}/edit', [IsExpensesController::class, 'edit']);
