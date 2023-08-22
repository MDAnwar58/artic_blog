<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes([
  'register' => true,
  'reset' => false,
  'verify' => false,
]);

Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('about-us', 'Frontend\AboutController@index')->name('about');

Route::get('contact-us', 'Frontend\ContactController@index')->name('contact');

// blog
Route::get('blog', 'Frontend\BlogController@index')->name('blog.index');
Route::get('blog/{slug}', 'Frontend\BlogController@show')->name('blog.show');

// comment
Route::post('comment', 'Frontend\CommentController@store')->name('comment.store');

// category
Route::get('category/{slug}', 'Frontend\CategoryController@show')->name('category.show');

// route group
Route::prefix('admin')->group(function () {

	// dashboard
	Route::get('/', 'Backend\HomeController@index')->name('admin.home');
	Route::resource('category', 'Backend\CategoryController', ['names' => 'admin.category']);
	Route::resource('blog', 'Backend\BlogController', ['names' => 'admin.blog']);

	Route::get('comments', 'Backend\CommentController@index')->name('admin.comment.index');
	Route::get('comments/{id}', 'Backend\CommentController@show')->name('admin.comment.show');

	Route::post('comment/store', 'Backend\CommentController@store')->name('admin.comment.store');
	Route::delete('comment/{id}', 'Backend\CommentController@destroy')->name('admin.comment.destroy');
	Route::get('notifications', 'Backend\NotificationController@index')->name('admin.notification.index');
	Route::get('notifications/{id}', 'Backend\NotificationController@show')->name('admin.notification.show');

});
