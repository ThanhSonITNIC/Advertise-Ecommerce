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

// admin
Route::prefix('admin')->middleware(['auth:api', 'levels:admin'])->group(function(){
    Route::apiResource('levels', 'LevelsController');
    Route::apiResource('posts', 'PostsController');
    Route::apiResource('post-types', 'PostTypesController');
    Route::apiResource('products', 'ProductsController');
    Route::apiResource('project-comments', 'ProjectCommentsController');
    Route::apiResource('projects', 'ProjectsController');
    Route::apiResource('project-types', 'ProjectTypesController');
    Route::apiResource('units', 'UnitsController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('configures', 'ConfiguresController');
});

// account
Route::prefix('account')->middleware(['auth:api', 'levels:customer', 'verified'])->group(function(){
    Route::apiResource('products', 'ProductsController');
    Route::apiResource('project-comments', 'ProjectCommentsController');
    Route::apiResource('projects', 'ProjectsController');
    Route::get('profile', 'AccountsController@profile');
    Route::put('profile', 'AccountsController@update');
});

// guest
Route::prefix('/')->group(function(){
    Route::apiResource('posts', 'PostsController');
    Route::apiResource('post-types', 'PostTypesController');
    Route::apiResource('project-comments', 'ProjectCommentsController');
    Route::apiResource('projects', 'ProjectsController');

    // register
    Route::post('register', 'Auth\RegisterController@register');

    // reset password
    // - send link reset
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    // - link reset to
    Route::get('password/reset', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // - reset
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    // verification 
    // - resend
    Route::get('verify/resend', 'Auth\VerificationController@resend');
    // - verify
    Route::get('verify', 'Auth\VerificationController@verify')->name('verification.verify');
});
