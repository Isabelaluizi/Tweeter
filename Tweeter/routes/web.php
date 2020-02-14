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
Route::post('/confirmDeleteProfile', 'userController@confirmDeleteProfile');
Route::post('/deleteProfile', 'userController@deleteProfile');
Route::post('/confirmDelete', 'userController@confirmDelete'); //is confirming if the user wants to delete
Route::post('/deleteTweet', 'userController@deleteTweet'); //is deleting a tweet if the user confirmed
Route::post('/searchUser', 'followController@searchUser');
Route::post('/findUsers','followController@showUsers'); // when an user click in find user, this route goes to show all users
Route::get('/findUsers','followController@showUsers');
Route::post('/followUser','followController@changeFollow'); // is creating relationship between the users (follow or unfollow)
Route::post('/createForm', 'userController@createForm'); // form to create a new tweet
Route::post('/createTweet', 'userController@createTweet'); // create a new tweet
Route::post('/editForm','userController@editForm'); // form tweet
Route::post('/editTweet','userController@editTweet');// create a existed tweet
Route::get('/readTweets','feedController@showTweets'); //page to read all tweets but yours
Route::post('/commentForm','feedController@commentForm'); // page to comment one tweet - form
Route::post('/commentTweet', 'feedController@commentTweet'); // add comment on database
Route::get('/readTweets/{tweetId}', 'feedController@showComments'); //show tweet and comments related to tweet
Route::post('deleteComment', 'feedController@deleteComment'); //is deleting a comment
Route::post('/editCommentForm','feedController@editCommentForm'); //showing edit form
Route::post('/editComment','feedController@editComment'); //update comment
Route::post('/likeTweet','feedController@addLike'); //filling the database
Route::post('/unlikeTweet', 'feedController@deleteLike');
