<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get("notebook", [Api\v1\NotebookController::class, 'index']);
    Route::get("notebook/{id}", [Api\v1\NotebookController::class, 'show']);
    Route::post("notebook", [Api\v1\NotebookController::class, 'create']);
    Route::post("notebook/{id}", [Api\v1\NotebookController::class, 'update']);
    Route::delete("notebook/{id}", [Api\v1\NotebookController::class, 'destroy']);
});

Route::group(['prefix' => 'v2'], function () {
    Route::put("notebook/{id}", [Api\v2\NotebookController::class, 'update']);
    Route::patch("notebook/{id}", [Api\v2\NotebookController::class, 'update']);
    Route::get(
        "notebook/{offset}/{limit}",
        [Api\v2\NotebookController::class, 'slice']
    );
});
