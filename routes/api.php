<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pudController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/drinks", [ pudController::class, "getDrinks"]);

Route::get("/oneDrink/{drinkName}", [ pudController::class, "getOneDrink"]);

Route::get("/likeDrink/{likeText}", [ pudController::class, "getLikeDrinks"]);

Route::get("/between/{value1}/{value2}", [ pudController::class, "getLess30"]);

Route::get("/adddrink", [ pudController::class, "addDrink"]);

Route::get("/drinkWtype", [pudController::class, "getDrinkWithType"]);

Route::get("/drinkWtype2", [pudController::class, "getLeftDrink"]);

Route::get("/drinkWtype3", [pudController::class, "getrightDrink"]);

Route::get("/aldrinkstable", [pudController::class, "getAllableData"]);

Route::get("/getlastid", [pudController::class, "getLastId"]);

Route::get("/deletedrink", [pudController::class, "deleteDrink"]);

Route::get("/deletetype", [pudController::class, "deleteType"]);

