<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[PostController::class, 'index'])->name('index');

    Route::group(['prefix' =>'post','as' =>'post'],function(){
        // 投稿
        Route::get('/create',[PostController::class,'create'])->name('create');
        // 投稿保存
        Route::post('/store',[PostController::class,'srote'])->name('store');

        Route::get('/{id}/show',[PostController::class,'show'])->name('show');
        Route::get('/{id}/edit',[PostController::class, 'edit'])->name('edit');
        Route::patch('/{id}/update',[PostController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy',[PostController::class, 'destroy'])->name('destroy');

    });
     
    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function(){
        Route::post('/{post_id}store',[CommentController::class,'store'])->name('store');
        Route::delete('/{post_id}destroy',[CommentController::class,'destroy'])->name('destroy');    

    });

    Route::group(['prefix' => 'profile', 'as' => 'profile'],function(){
        Route::get('/', [UserController::class,'show'])->name('show');
        Route::get('/edit',[UserController::class,'edit'])->name('edit');
      Route::patch('/update',[UserController::class,'update'])->name('update');
    
    });
});