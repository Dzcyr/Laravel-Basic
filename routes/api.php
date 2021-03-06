<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthorizationsController;
use App\Http\Controllers\Api\BannersController;

Route::prefix('v1')->group(function () {
    //Route::middleware('throttle:' . config('api.rate_limits.sign'))->group(function () {
        // 小程序 注册登录
        Route::post('weapp/authorizations', [AuthorizationsController::class, 'weappStore']);
    //});

    Route::middleware('throttle:' . config('api.rate_limits.access'))->group(function () {
        // 登录后可以访问的接口
        Route::middleware('api.refresh')->group(function() {
        
        });
        // 轮播图
        Route::get('banners', [BannersController::class, 'index']);
    });
});
