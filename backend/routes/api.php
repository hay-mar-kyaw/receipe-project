<?php

use App\Http\Controllers\ReceipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/receipes',[ReceipeController::class,'index']);
Route::get('/receipes/{receipe}',[ReceipeController::class,'show']);
Route::destroy('/receipes/{receipe}',[ReceipeController::class,'delete']);
