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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userProfile', 'userController@showProfile');
Route::post('editProfile', 'userController@showProfileEdit');
Route::post('/updateProfile', 'userController@updateProfile');
Route::post('/deleteProfile', 'userController@deleteProfile');
Route::post('/confirmDelete', 'feedController@confirmDelete'); //is confirming if the user wants to delete
Route::post('/deleteTweet', 'feedController@deleteTweet'); //is deleting a tweet if the user confirmed
Route::post('/findUsers','followController@showUsers'); // when an user click in find user, this route goes to show all users
Route::post('/followUser','followController@changeFollow');
Route::post('/createTweet', 'userController@createForm');
