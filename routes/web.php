<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdministrator;



use App\Models\Device;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/about', PagesController::class,'about');
// Route::get('/features', PagesController::class, 'features');
// Route::get('/contact', PagesController::class,'contact');

Route::get('/channel', function () {
    return view('channel');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/contact', function () {
    return view('contact');
});

//  Route::get('/devices/index', 'App\Http\Controllers\admin\DevicesController@index');
//  Route::get('/devices/create', 'App\Http\Controllers\admin\DevicesController@create');
//  Route::POST('/devices/{post}', 'App\Http\Controllers\admin\DevicesController@store');
//  Route::get('/devices/{$id}', 'App\Http\Controllers\admin\DevicesController@show');



Route::resource('user', SchedulesController::class);

Route::resource('user', DevicesController::class);



// Route::get('/user/index', 'DevicesController@index');
// Route::get('/user/create', 'DevicesController@create');
// Route::POST('/user/store', 'DevicesController@store');

// Route for User
// Route::get('/home', 'DevicesController@index')->name('home');

Route::resource('admin', 'admin\DevicesController'::class);

//Route middleware for checking if user is admin to display admin panel
Route::middleware([Isadministrator::class])->group(function () {
    Route::get('home', [Homecontroller::class, 'home']);
});
