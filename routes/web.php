<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;

Route::middleware(["middleware" => "measure.response"])->group(function () {
    Route::resource('/', HomeController::class);
    Route::resource('/file', FileController::class);
    Route::get("/download", [FileController::class, 'download']);
});
