<?php

use App\Http\Controllers\MotorBikeController;
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

Route::get('/motorbikes',[MotorBikeController::class,'index'])->name('index');
Route::get('/create',[MotorBikeController::class,'create'])->name('motorbike.create');
Route::post('/motorbikes/create',[MotorBikeController::class,'store'])->name('motorbike.store');
Route::get('/motorbikes/{motorbike}',[MotorBikeController::class,'show'])->name('motorbike.show');


