<?php

use App\Http\Controllers\admin\RoutesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin'],function(){
    Route::get('/', [RoutesController::class, 'index'])->name('admin.index');
});
