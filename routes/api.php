<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group and "App\Http\Controllers\Api" namespace.
| and "api." route's alias name. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('user', function () {
    return request()->user();
});
Route::post('/register', 'RegisterController@register')->name('sanctum.register');
Route::post('/registerrequestforval', 'RegisterController@resgistervaltion')->name('sanctum.registerval');


Route::post('/login', 'LoginController@login')->name('sanctum.login');
Route::post('/firebase/login', 'LoginController@firebase')->name('sanctum.login.firebase');

Route::post('/password/forget', 'ResetPasswordController@forget')->name('password.forget');
Route::post('/password/code', 'ResetPasswordController@code')->name('password.code');
Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.reset');
Route::get('/select/users', 'UserController@select')->name('users.select');

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('getPusherNotificationToken', 'LoginController@getPusherNotificationToken');

    Route::post('password', 'VerificationController@password')->name('password.check');
    Route::post('verification/send', 'VerificationController@send')->name('verification.send');
    Route::post('verification/verify', 'VerificationController@verify')->name('verification.verify');
    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::match(['put', 'patch'], 'profile', 'ProfileController@update')->name('profile.update');
    Route::match(['put', 'patch'], 'updateoffice', 'ProfileController@updateoffice');

    
});
Route::post('/editor/upload', 'MediaController@editorUpload')->name('editor.upload');
Route::get('/settings', 'SettingController@index')->name('settings.index');


Route::get('/getadv', 'SettingController@one');


Route::get('/settings/pages/{page}', 'SettingController@page')
    ->where('page', 'about|terms|privacy')->name('settings.page');

Route::post('feedback', 'FeedbackController@store')->name('feedback.send');
// Cities Routes.
Route::apiResource('cities', 'CityController');
Route::get('/select/cities', 'CityController@select')->name('cities.select');
Route::get('/select/cities/{city}', 'CityController@selectShow')->name('cities.selectShow');
// Types Routes.
Route::apiResource('types', 'TypeController');
Route::get('/select/types', 'TypeController@select')->name('types.select');
Route::get('types/{type}/fields', 'TypeController@fields')->name('types.fields');

// Estates Routes.
Route::get('favorite/estates', 'EstateController@listFavorites');
Route::patch('estates/{estate}/favorite', 'EstateController@favorite');
Route::apiResource('estates', 'EstateController');
Route::middleware('auth:sanctum')->patch('estates/{estate}/republish', 'EstateController@republish');





Route::apiResource('office-owners', 'OfficeOwnerController')->only('index', 'show');

Route::get('officelogin', 'OfficeOwnerController@officelogin');
Route::get('getestatesforoffice', 'OfficeOwnerController@getEstatesforoffice');


Route::get('office-owners/{office_owner}/estates', 'OfficeOwnerController@getEstates');
Route::patch('estates/{estate}/lock', 'EstateController@toggleLock');
Route::patch('estates/{estate}/sold', 'EstateController@toggleSold');
Route::get('my/estates', 'EstateController@getMyEstates');
Route::get('/select/estates', 'EstateController@select')->name('estates.select');

// Contractors Routes.
Route::apiResource('contractors', 'ContractorController');
Route::get('/select/contractors', 'ContractorController@select')->name('contractors.select');

// Orders Routes.
Route::apiResource('orders', 'OrderController');
Route::get('myorders', 'OrderController@getMyOrders');

Route::middleware('auth:sanctum')->post('orders', 'OrderController@store')->name('orders.store');
Route::middleware('auth:sanctum')->patch('orders/{order}/republish', 'OrderController@republish')->name('orders.republish');
Route::middleware('auth:sanctum')->patch('orders/{order}/lock', 'OrderController@toggleLock');

Route::get('/select/orders', 'OrderController@select')->name('orders.select');

// EngineeringOffices Routes.
Route::apiResource('engineering_offices', 'EngineeringOfficeController');
Route::get('/select/engineering_offices', 'EngineeringOfficeController@select')->name('engineering_offices.select');


//
//Expert Routes.
Route::apiResource('expert', 'ExpertController');
 //chat
 Route::post('chat/rooms/{room}/send-message' , 'ChatController@sendMessage');
 Route::get('chat/room/{userId}' , 'ChatController@getRoomByUser');
 Route::get('chat/rooms/{room}' , 'ChatController@getRoom');
 Route::get('chat/rooms' , 'ChatController@rooms');
 Route::get('chat/contacts/{user}' , 'ChatController@getRoomByUser');
 Route::get('chat/contacts' , 'ChatController@contacts');
 Route::get('chat/unread-rooms' , 'ChatController@getUnreadRooms');

 // likes 

 Route::apiResource('like', 'LikeController');
//Block

Route::apiResource('block', 'BlockController');
//repoert
Route::apiResource('report', 'ReportController');

//CategoryArcheticture

Route::apiResource('categoryarcheticture', 'CategoryArchetictureController');


//archeticture
Route::apiResource('archeticture', 'ArchetictureController');


//RquestArcheticture
Route::apiResource('rquestarcheticture', 'RquestArchetictureController');


//advisor
Route::apiResource('advisor', 'AdvisorController');


//calculator

Route::apiResource('calculator', 'CalculatorController');


//Discharge

Route::apiResource('discharge', 'AccountBankController');


//requsetsponsor
Route::apiResource('requsetsponsor', 'RequsetSponsorController');



//Requestdocument
Route::apiResource('requestdocument', 'RequestdocumentationController');

//Home
Route::apiResource('home', 'HomeController');

//notifications
/*  The routes of generated crud will set here: Don't remove this line  */
Route::get('notifications', 'NotificationController@index')->middleware('auth:sanctum');
