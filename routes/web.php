<?php

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

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\StatistikController;

Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
Route::get('/statistik/create', [StatistikController::class, 'create'])->name('statistik.create');
Route::post('/statistik', [StatistikController::class, 'store'])->name('statistik.store');
Route::get('/statistik/{id}/edit', [StatistikController::class, 'edit'])->name('statistik.edit');
Route::put('/statistik/{id}', [StatistikController::class, 'update'])->name('statistik.update');
Route::delete('/statistik/{id}', [StatistikController::class, 'destroy'])->name('statistik.destroy');
