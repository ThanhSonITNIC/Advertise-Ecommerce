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

Auth::routes();

// admin
Route::prefix('admin')->middleware(['auth:api', 'levels:admin'])->group(function(){
    Route::apiResource('levels', 'LevelsController');
    Route::apiResource('posts', 'PostsController');
    Route::apiResource('post-types', 'PostTypesController');
    Route::apiResource('products', 'ProductsController');
    Route::apiResource('project-comments', 'ProjectCommmentsController');
    Route::apiResource('projects', 'ProjectsController');
    Route::apiResource('units', 'UnitsController');
    Route::apiResource('users', 'UsersController');
});

// account
Route::prefix('account')->middleware(['auth:api', 'levels:customer'])->group(function(){
    Route::apiResource('products', 'ProductsController');
    Route::apiResource('project-comments', 'ProjectCommmentsController');
    Route::apiResource('projects', 'ProjectsController');
    Route::apiResource('users', 'UsersController');
});

// guest
Route::prefix('/')->group(function(){
    Route::apiResource('posts', 'PostsController');
    Route::apiResource('post-types', 'PostTypesController');
    Route::apiResource('project-comments', 'ProjectCommentsController');
    Route::apiResource('projects', 'ProjectsController');
});
