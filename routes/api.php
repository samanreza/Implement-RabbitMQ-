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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::post("/message", function (Request $request) {
//    $message = $request->get('message');
////    $mqService = new RabbitMQService();
////    $mqService->publish($message);
//    //$notify = new \App\Notifications\SendSmsClass('+9122465653','912565874',$message);
//    //$notify->toSms($notify);
//    $data = ['name' => 'Jon Doe', 'phone' => '12345678901'];
//    dispatch(new \App\Jobs\TestQueue($data));
//    return view('welcome');
//})->name('message');

Route::post("/message",[\App\Http\Controllers\Controller::class,'index'])->name('message');
