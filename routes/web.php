<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    #これからrouteつくるときはこのなかに書く
    Route::get('/',[PostController::class, 'index'])->name('index');
});