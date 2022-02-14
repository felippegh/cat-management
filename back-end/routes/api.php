<?php

use App\Http\Controllers\Api\CatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('cats', CatController::class);
