<?php

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

// ----------- PUBLIC ROUTES -----------
// No need to be logged in to be navigated
// HomeController
Route::get('/', 'HomeController@index')->name('index');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
// PostController
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');
// CategoryController
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/{category_slug}', 'CategoryController@show')->name('categories.show');
// TagController
Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('/tags/{tag_slug}', 'TagController@show')->name('tags.show');

// Removing the route "Register"
Auth::routes(['register' => false]);


// ----------- AUTHENTICATION ROUTES -----------
// Need to be logged in to be navigated

/*
The instruction "middleware()" is needed to manage all the routes which need an authentication to be navigated --> the user needs to be logged in
If I add the middleware() function here, I can remove it from the file "HomeController.php" (where there is a CONSTRUCTOR __construct)
*/

Route::prefix('admin')->namespace('Admin')->middleware('auth')->name('admin.')->group(function() {
  Route::get('/', 'HomeController@index')->name('index');
  Route::resource('/posts', 'PostController');
  Route::get('/profile', 'HomeController@profile')->name('profile');
  Route::post('/profile/generate-token', 'HomeController@generateToken')->name('generate_token');
});
