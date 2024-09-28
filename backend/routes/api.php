<?php

use App\Http\Controllers\ReceipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/receipes',[ReceipeController::class,'index']);
Route::post('/receipes',[ReceipeController::class,'store']);
Route::get('/receipes/{receipe}',[ReceipeController::class,'show']);
Route::delete('/receipes/{receipe}',[ReceipeController::class,'destroy']);
