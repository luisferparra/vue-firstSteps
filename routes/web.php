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



Route::get('/',function() {
    return view('index');
});

Route::get('skills',function() {
    return view('skills');
});

Route::get('skillsAjax', function () {
 return ['Uno','dos','tres','cuatro','cinco'];
});

Route::get('projects/create','Projects\projectController@create');

Route::post('projects','Projects\projectController@store');

/* Route::get('/', function () {
    return view('welcome');
});
 */