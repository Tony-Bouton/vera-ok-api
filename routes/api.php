<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');

Route::get('/restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit');

Route::put('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');

Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');

ROute::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');
