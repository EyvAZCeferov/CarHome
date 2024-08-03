<?php

use App\Http\Controllers\admin\RoutesController;
use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

Route::get("flush", function () {
    Cache::flush();
    return "Cache OK";
});
Route::get("set_eyvaz",[AuthController::class,'set_eyvaz']);