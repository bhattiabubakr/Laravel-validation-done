<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PersonsController;
use App\Http\Controllers\API\DeviceController;
use App\Http\Controllers\API\OwnerController;
use App\Http\Controllers\API\PetController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\ProductController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('people', PersonsController::class);
Route::apiResource('devices', DeviceController::class);
Route::apiResource('owners', OwnerController::class);
Route::apiResource('pets', PetController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('products', ProductController::class);
