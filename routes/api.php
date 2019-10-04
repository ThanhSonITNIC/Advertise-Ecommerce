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
Route::prefix('admin')->namespace('Administrator')->middleware(['auth:api', 'levels:admin'])->group(function(){
    Route::apiResource('levels', 'LevelsController');
    Route::apiResource('posts', 'PostsController');
    Route::apiResource('post-types', 'PostTypesController');
    Route::apiResource('materials', 'MaterialsController');
    Route::apiResource('project-comments', 'ProjectCommentsController');
    Route::apiResource('projects', 'ProjectsController');
    Route::apiResource('project-types', 'ProjectTypesController');
    Route::apiResource('units', 'UnitsController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('configures', 'ConfiguresController');
});

// account
Route::prefix('account')->namespace('Customer')->middleware(['auth:api', 'levels:customer', 'verified'])->group(function(){
    Route::apiResource('project-comments', 'ProjectCommentsController')->except('index');
    Route::apiResource('projects', 'ProjectsController')->only(['index', 'show']);
    Route::get('profile', 'AccountsController@profile');
    Route::put('profile', 'AccountsController@update');
});

// guest
Route::prefix('')->namespace('Guest')->group(function(){
    Route::apiResource('posts', 'PostsController')->only(['index', 'show']);
    Route::apiResource('post-types', 'PostTypesController')->only(['index', 'show']);
    Route::apiResource('projects', 'ProjectsController')->only(['index', 'show']);
});

// auth
Route::prefix('')->namespace('Auth')->group(function(){
    // register
    Route::post('register', 'RegisterController@register');

    // reset password
    // - send link reset
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    // - link reset to
    Route::get('password/reset', 'ResetPasswordController@showResetForm')->name('password.reset');
    // - reset
    Route::post('password/reset', 'ResetPasswordController@reset');

    // verification 
    // - resend
    Route::get('verify/resend', 'VerificationController@resend');
    // - verify
    Route::get('verify', 'VerificationController@verify')->name('verification.verify');
});
