<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ApiController::class, 'index'])->name('home');
Route::get('/operator/{name}',[ApiController::class, 'show'])->name('operator.details');
