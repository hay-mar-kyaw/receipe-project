<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReceipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Get all categories
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/receipes',[ReceipeController::class,'index']);
Route::post('/receipes',[ReceipeController::class,'store']);
//Upload an image
Route::post('/receipes/upload',[ReceipeController::class,'upload']);
Route::get('/receipes/{receipe}',[ReceipeController::class,'show']);
Route::patch('/receipes/{receipe}',[ReceipeController::class,'update']);
Route::delete('/receipes/{receipe}',[ReceipeController::class,'destroy']);
