<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    #これからrouteつくるときはこのなかに書く
    Route::get('/',[PostController::class, 'index'])->name('index');

    Route::group(['prefix' =>'post','as' =>'post'],function(){
        // 投稿
        Route::get('/create',[PostController::class,'create'])->name('create');
        // 投稿保存
        Route::post('/store',[PostController::class,'srote'])->name('store');

        Route::get('/{id}/show',[PostController::class,'show'])->name('show');
      

    });

    Route::group(['prefix' => 'profile', 'as' => 'profile'],function(){
        Route::get('/', [UserController::class,'show'])->name('show');
    
    });
});