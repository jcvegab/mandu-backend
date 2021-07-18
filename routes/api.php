<?php

use App\Models\Division;
use App\Http\Controllers\DivisionsApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/divisions', [DivisionsApiController::class, 'index']);
Route::post('/divisions', [DivisionsApiController::class, 'store']);
Route::put('/divisions/{division}', [DivisionsApiController::class, 'update']);
Route::delete('/divisions/{division}', [DivisionsApiController::class, 'destroy']);