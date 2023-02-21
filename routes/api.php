<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChiefController;
use App\Http\Controllers\SkladController;
use App\Http\Controllers\WorkmanController;
use App\Http\Controllers\BugalterController;
use App\Http\Controllers\DirectorController;
//test
Route::post('login', [AuthController::class, 'login']);
Route::post('refreshToken', [AuthController::class, 'refreshToken']);
    
    Route::group(['middleware' => ["auth:api"]], function(){

        Route::group(['middleware' => ["isAdmin:api"]], function(){
            Route::prefix('user')->group(function(){
                Route::get('list',[UserController::class,'list']);
                Route::get('show',[UserController::class,'show']);
                Route::post('create',[UserController::class,'create']);
                Route::post('update',[UserController::class,'update']);
                Route::get('delete',[UserController::class,'delete']);
            });
            Route::prefix('type')->group(function(){
                Route::get('list',[TypeController::class,'list']);
                Route::post('create',[TypeController::class,'create']);
                Route::post('update',[TypeController::class,'update']);
                Route::get('delete',[TypeController::class,'delete']);
            });
            Route::prefix('sklad')->group(function(){
                Route::get('list',[SkladController::class,'list']);
                Route::get('show',[SkladController::class,'show']);
                Route::post('create',[SkladController::class,'create']);
                Route::post('update',[SkladController::class,'update']);
                Route::get('delete',[SkladController::class,'delete']);
            });
        });
        Route::group(['middleware' => ["isWorkman:api"]], function(){
            Route::prefix('workman')->group(function(){
                Route::get('list',[WorkmanController::class,'list']);
                Route::get('show',[WorkmanController::class,'show']);
                Route::post('create/document',[WorkmanController::class,'createDocument']);
                Route::post('create/product',[WorkmanController::class,'createProduct']);
                Route::get('delete',[WorkmanController::class,'delete']);
                Route::get('send',[WorkmanController::class,'send']);
                Route::get('abort/list',[WorkmanController::class,'abortList']);
            });
        });
        Route::group(['middleware' => ["isChief:api"]], function(){
            Route::prefix('chief')->group(function(){
                Route::get('list',[ChiefController::class,'list']);
                Route::get('show',[ChiefController::class,'show']);
                Route::get('send',[ChiefController::class,'send']);
                Route::get('unsend',[ChiefController::class,'unsend']);
                Route::get('abort/list',[ChiefController::class,'abortList']);
            });
        });
        Route::group(['middleware' => ["isDirector:api"]], function(){
            Route::prefix('director')->group(function(){
                Route::get('list',[DirectorController::class,'list']);
                Route::get('show',[DirectorController::class,'show']);
                Route::get('send',[DirectorController::class,'send']);
                Route::get('unsend',[DirectorController::class,'unsend']);
            });
        });
        Route::group(['middleware' => ["isBugalter:api"]], function(){
            Route::prefix('bugalter')->group(function(){
                Route::get('list',[BugalterController::class,'list']);
                Route::get('show',[BugalterController::class,'show']);
            });
        });
        Route::get('logOut',[AuthController::class,'logOut'])->name('logOut');

    });
