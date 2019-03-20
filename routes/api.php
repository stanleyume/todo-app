<?php

use Illuminate\Http\Request;

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

// Get todo items
Route::get('/todos', 'TodoController@get_todos');
// Create new todo item
Route::post('/todos', 'TodoController@create');
// Update todo item
Route::put('/todos/{todo}', 'TodoController@update');
// Delete todo item
Route::delete('/todos/{todo}', 'TodoController@delete');
