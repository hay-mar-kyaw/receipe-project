<?php

use App\Http\Controllers\ReceipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/receipes',[ReceipeController::class,'index']);
