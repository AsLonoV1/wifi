<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('login', [AuthController::class, 'login']);
Route::post('refreshToken', [AuthController::class, 'refreshToken']);
    
    Route::group(['middleware' => ["auth:api"]], function(){

        Route::prefix('user')->group(function(){
            Route::get('list',[UserController::class,'list'])->name('userList');
            Route::get('show',[UserController::class,'show'])->name('userShow');
            Route::post('create',[UserController::class,'create'])->name('userCreate');
            Route::post('update',[UserController::class,'update'])->name('userUpdate');
            Route::get('delete',[UserController::class,'delete'])->name('userDelete');
        });

 












        

        Route::get('logOut',[AuthController::class,'logOut'])->name('logOut');

    });




















