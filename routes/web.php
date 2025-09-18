<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('progresses',ProgressController::class);