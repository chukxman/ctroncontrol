<?php

// use App\Http\Controllers\DevicesController;
// use App\Http\Controllers\EngineersController;
// use App\Http\Controllers\OperationController;
// use App\Http\Controllers\SubusersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Middleware\IsAdministrator;
// use App\Http\Middleware\isEngineer;
// use App\Http\Middleware\isParent;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('isadmin');
Route::group(['middleware' => ['check.token.and.admin']], function () {
    Route::post('/admin/endpoint', [AdminController::class, 'method']);
    // Other admin routes...
});


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



Route::resource('/user/engineer', EngineersController::class);

Route::get('user/subuser/subuserslist/', 'SubusersController@subuserslist')->name('subuserslist');
Route::get('user/subuser/{user_id}/devices/', 'SubusersController@devices')->name('subuserdevices');
Route::get('user/subuser/{user_id}/devices/{device_id?}/showdevice', 'SubusersController@showdevice')->name('subusershowdevice');
Route::get('user/editdevices/', 'SubusersController@editdevices')->name('editlist');
Route::get('user/deletedevices/', 'SubusersController@deletedevices')->name('deletelist');

Route::resource('/user/subuser', SubusersController::class);

//Operation Route

Route::put('user/{device_id}/updateChannel1Schedule', 'OperationController@updateChannel1Schedule')->name('updateChannel1Schedule');
Route::put('user/{device_id}/updateChannel2Schedule', 'OperationController@updateChannel2Schedule')->name('updateChannel2Schedule');
Route::put('user/{device_id}/updateChannel3Schedule', 'OperationController@updateChannel3Schedule')->name('updateChannel3Schedule');
Route::put('user/{device_id}/updateChannel4Schedule', 'OperationController@updateChannel4Schedule')->name('updateChannel4Schedule');
Route::put('user/{device_id}/updateChannel1State', 'OperationController@updateChannel1State')->name('updateChannel1State');
Route::put('user/{device_id}/updateChannel2State', 'OperationController@updateChannel2State')->name('updateChannel2State');
Route::put('user/{device_id}/updateChannel3State', 'OperationController@updateChannel3State')->name('updateChannel3State');
Route::put('user/{device_id}/updateChannel4State', 'OperationController@updateChannel4State')->name('updateChannel4State');
Route::put('user/{device_id}/updateChannel1Counter', 'OperationController@updateChannel1Counter')->name('updateChannel1Counter');
Route::put('user/{device_id}/updateChannel2Counter', 'OperationController@updateChannel2Counter')->name('updateChannel2Counter');
Route::put('user/{device_id}/updateChannel3Counter', 'OperationController@updateChannel3Counter')->name('updateChannel3Counter');
Route::put('user/{device_id}/updateChannel4Counter', 'OperationController@updateChannel4Counter')->name('updateChannel4Counter');




// Route::put('user/updateDevice', [DevicesController::class, 'updateDevice'])->name('updateDevice');

Route::put('user/{device_id}/updateDevice', 'DevicesController@updateDevice')->name('updateDevice');
Route::put('user/{device_id}/updateChannel1Schedule', 'DevicesController@updateChannel1Schedule')->name('updateChannel1Schedule');
Route::put('user/{device_id}/updateChannel2Schedule', 'DevicesController@updateChannel2Schedule')->name('updateChannel2Schedule');
Route::put('user/{device_id}/updateChannel3Schedule', 'DevicesController@updateChannel3Schedule')->name('updateChannel3Schedule');
Route::put('user/{device_id}/updateChannel4Schedule', 'DevicesController@updateChannel4Schedule')->name('updateChannel4Schedule');
Route::put('user/{device_id}/updateChannel1State', 'DevicesController@updateChannel1State')->name('updateChannel1State');
Route::put('user/{device_id}/updateChannel2State', 'DevicesController@updateChannel2State')->name('updateChannel2State');
Route::put('user/{device_id}/updateChannel3State', 'DevicesController@updateChannel3State')->name('updateChannel3State');
Route::put('user/{device_id}/updateChannel4State', 'DevicesController@updateChannel4State')->name('updateChannel4State');
Route::put('user/{device_id}/updateChannel1Counter', 'DevicesController@updateChannel1Counter')->name('updateChannel1Counter');
Route::put('user/{device_id}/updateChannel2Counter', 'DevicesController@updateChannel2Counter')->name('updateChannel2Counter');
Route::put('user/{device_id}/updateChannel3Counter', 'DevicesController@updateChannel3Counter')->name('updateChannel3Counter');
Route::put('user/{device_id}/updateChannel4Counter', 'DevicesController@updateChannel4Counter')->name('updateChannel4Counter');
Route::put('user/{device_id}/downloadfirmware', 'DevicesController@downloadfirmware')->name('downloadfirmware');
Route::get('user/{device_id}/eventlog', 'DevicesController@eventlog')->name('eventlog');
Route::get('user/{device_id}/exporteventlog', 'DevicesController@exporteventlog')->name('exporteventlog');
Route::get('user/create_device', 'DevicesController@create_device')->name('create_user_device');
Route::put('user/{device_id}/cleartamper', 'DevicesController@cleartamper')->name('cleartamper');



Route::resource('/user', DevicesController::class);

Route::get('{id?}/{channel?}/CallSchedule', 'DeviceConnectionController@CallSchedule');
Route::get('{id?}/{temperature?}/CallState', 'DeviceConnectionController@CallState');
Route::get('{id?}/{channel?}/{channelstate?}/{controlsource?}/PostDeviceState', 'DeviceConnectionController@PostDeviceState');
Route::get('{id?}/{organization_name?}/{device_name?}/{mac_address?}/{firmware_version?}/PostDeviceDetails', 'DeviceConnectionController@PostDeviceDetails');
Route::get('{id?}/ChangeDeviceDetails', 'DeviceConnectionController@ChangeDeviceDetails');
Route::get('/DownloadFirmware/{file}', 'DeviceConnectionController@DownloadFirmware');
Route::get('{id?}/{tamper_mode?}/{actions?}/{reporting?}/{channel?}/{channelstate?}/{controlsource?}/PostDeviceUpdate', 'DeviceConnectionController@PostDeviceUpdate');
Route::get('{id}/GetSms', 'DeviceConnectionController@GetSms');
Route::get('{id}/ResetSms', 'DeviceConnectionController@ResetSms');

Route::get('/admin/uploadfirmware', 'admin\FilesController@index')->name('upload');
Route::POST('/admin/uploadfirmware', 'admin\FilesController@uploadfile')->name('uploadfirmware');
Route::get('/admin/admineditlist', 'admin\DevicesController@admineditlist')->name('admineditlist');
Route::get('/admin/admindeletelist', 'admin\DevicesController@admindeletelist')->name('admindeletelist');


Route::resource('/admin', 'admin\DevicesController'::class);
Route::POST('/admin/store', 'admin\DevicesController@strore')->name('store');

// Route::resource('/admin/uploadfirmware', 'admin\UploadController'::class);

Route::get('/admin/users/deleteuserslist', 'admin\UsersController@deleteuserslist')->name('deleteuserslist');
Route::get('/admin/users/alluserslist', 'admin\UsersController@alluserslist')->name('alluserslist');


Route::resource('/admin/users', 'admin\UsersController'::class);

//Route middleware for checking if user is admin to display admin panel
Route::middleware([IsAdministrator::class])->group(function () {
    // Route::get('home', [App\Http\Controllers\Homecontroller::class, 'home']);
});
Route::middleware([isEngineer::class])->group(function () {
    // Route::get('home', [App\Http\Controllers\Homecontroller::class, 'home']);
});
Route::middleware([isParent::class])->group(function () {
    // Route::get('home', [App\Http\Controllers\Homecontroller::class, 'home']);
});
