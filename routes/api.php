<?php

use App\Models\Division;
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


Route::get('/divisions', function() {
    return Division::all();
});

Route::post('/divisions', function() {
    request()->validate([
        'name' => 'required',
        'level' => 'required',
    ]);

    return Division::create([
        'name' => request('name'),
        'level' => request('level'),
    ]);
});

Route::put('/divisions/{division}', function(Division $division) {
    request()->validate([
        'name' => 'required',
        'level' => 'required',
    ]);

    $success = $division->update([
        'name' => request('name'),
        'level' => request('level'),
    ]);

    return [
        'success' => $success
    ];
});

Route::delete('/divisions/{division}', function(Division $division) {
    $success = $division->delete();

    return [
        'success' => $success
    ];
});