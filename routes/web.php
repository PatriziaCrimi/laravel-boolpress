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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// The instruction "middleware()" is needed to manage all the routes which need an authentication to be navigated --> the user needs to be logged in
// If I add the middleware() function here, I can remove it from the file "HomeController.php" (where there is a CONSTRUCTOR __construct)
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
