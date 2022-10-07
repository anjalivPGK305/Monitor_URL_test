<?php

use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('api')->group(function () {

    Route::get('/url/list',[UrlController::class, 'list']);
    Route::post('/url/add',[UrlController::class, 'add']);
    Route::delete('/url/del/{id}',[UrlController::class, 'del']);
    Route::get('/user/list',[UserController::class, 'userList']);
    Route::post('user/create', [UserController::class, 'userCreate']);
    Route::delete('user/delete/{id}', [UserController::class, 'userDelete']);
    Route::post('checkurl',[UrlController::class, 'checkUrl']);
});
