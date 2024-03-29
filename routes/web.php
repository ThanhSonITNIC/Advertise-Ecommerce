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

// configures
Route::prefix('config')->namespace('Configures')->name('configures.')->group(function(){
    Route::get('language/{language}', 'LanguageController@change')->name('language');
});

// auth
Auth::routes(['verify' => true]);
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// guest
Route::prefix('')->namespace('Guest')->middleware('levels')->name('guest.')->group(function(){
    Route::get('', 'HomeController@index')->name('home');

    Route::get('about', 'NewsController@about')->name('about');

    Route::get('contact', 'NewsController@contact')->name('contact');
    
    Route::get('policies', 'NewsController@policies')->name('policies');

    Route::get('news', 'NewsController@index')->name('news');
    Route::get('posts/{id}', 'NewsController@show')->name('news.show');
    Route::get('posts/type/{id}', 'NewsController@type')->name('posts.type');

    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('projects/{id}', 'ProjectsController@show')->name('projects.show');
    Route::get('projects/type/{id}', 'ProjectsController@type')->name('projects.type');
    
});

// admin
Route::prefix('admin')->middleware(['auth', 'verified', 'levels:admin'])->name('admin.')->group(function(){

    Route::namespace('Administrator')->group(function(){
        Route::get('', 'DashboardController@index')->name('dashboard');

        Route::resource('users', 'UsersController');
        Route::put('users/{id}/password/update', 'UsersController@updatePassword')->name('users.password.update');
    
        Route::resource('projects', 'ProjectsController');
        Route::get('projects/type/{id}', 'ProjectsController@type')->name('projects.type');
    
        Route::resource('materials', 'MaterialsController');
    
        Route::resource('posts', 'PostsController');
        Route::get('posts/type/{id}', 'PostsController@type')->name('posts.type');

        Route::resource('project-contents', 'ProjectContentsController');

        Route::resource('project-materials', 'ProjectMaterialsController');

        Route::resource('import-materials', 'ImportMaterialsController');
        
        Route::resource('import-material-logs', 'ImportMaterialLogsController');

        Route::get('configures/logo', 'Configures\LogoController@index')->name('configures.logo');
        Route::get('configures/banner', 'Configures\BannerController@index')->name('configures.banner');
        Route::resource('configures', 'Configures\ConfiguresController');

        Route::resource('units', 'UnitsController');
        Route::resource('levels', 'LevelsController');
        Route::resource('project-types', 'ProjectTypesController');
        Route::resource('post-types', 'PostTypesController');
        Route::resource('user-statuses', 'UserStatusesController');

    });

    Route::prefix('upload')->namespace('Upload')->name('upload.')->group(function(){
        Route::post('images/post', 'ImagesController@post')->name('post');
        Route::post('images/article', 'ImagesController@article')->name('article');
        Route::post('images/logo', 'ImagesController@logo')->name('logo');
        Route::post('images/banner', 'ImagesController@banner')->name('banner');
    });

});