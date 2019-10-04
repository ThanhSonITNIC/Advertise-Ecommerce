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

// Route::any('{all}', function () {
//     return view('app');
// })
// ->where(['all' => '.*']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::prefix('')->namespace('Guest')->name('guest.')->group(function(){
    Route::get('', 'HomeController@index')->name('home');

    Route::get('about', 'AboutController@index')->name('about');

    Route::get('contact', 'ContactController@index')->name('contact');
    
    Route::get('news', 'NewsController@index')->name('news');
    Route::get('news/{id}', 'NewsController@show')->name('news.show');

    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('projects/{id}', 'ProjectsController@show')->name('projects.show');
    
});
