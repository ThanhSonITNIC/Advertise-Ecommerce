<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Auth::routes();
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// guest
Route::prefix('')->namespace('Guest')->middleware('levels')->name('guest.')->group(function(){
    Route::get('', 'HomeController@index')->name('home');

    Route::get('about', 'NewsController@about')->name('about');

    Route::get('contact', 'NewsController@contact')->name('contact');
    
    Route::get('policies', 'NewsController@policies')->name('policies');

    Route::get('news', 'NewsController@index')->name('news');
    Route::get('posts/{id}', 'NewsController@show')->name('news.show');

    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('projects/{id}', 'ProjectsController@show')->name('projects.show');
    Route::get('projects/type/{id}', 'ProjectsController@type')->name('projects.type');
    
});

// admin
Route::prefix('admin')->middleware(['auth', 'levels:admin'])->name('admin.')->group(function(){

    Route::namespace('Administrator')->group(function(){
        Route::get('', 'DashboardController@index')->name('dashboard');

        Route::resource('users', 'UsersController');
    
        Route::resource('projects', 'ProjectsController');
        Route::get('projects/type/{id}', 'ProjectsController@type')->name('projects.type');
    
        Route::resource('materials', 'MaterialsController');
    
        Route::resource('posts', 'PostsController');
        Route::get('posts/type/{id}', 'PostsController@type')->name('posts.type');
    });

    Route::prefix('upload')->namespace('Upload')->name('upload.')->group(function(){
        Route::post('images/post', 'ImagesController@post')->name('post');
        Route::post('images/article', 'ImagesController@article')->name('article');
    });

});