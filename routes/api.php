<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\RabbitMQService;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("/message",[\App\Http\Controllers\Controller::class,'index'])->name('message');
Route::post("/create-user",[\App\Http\Controllers\UserController::class,'store'])->name('new.user');
