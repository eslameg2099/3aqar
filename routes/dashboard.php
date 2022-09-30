<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "dashboard" middleware group and "App\Http\Controllers\Dashboard" namespace.
| and "dashboard." route's alias name. Enjoy building your dashboard!
|
*/
Route::get('locale/{locale}', 'LocaleController@update')->name('locale')->where('locale', '(ar|en)');

Route::get('/', 'DashboardController@index')->name('home');

// Select All Routes.
Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
Route::delete('restore', 'DeleteController@restore')->name('restore.selected');

// Office Owner Routes.
Route::get('trashed/office-owners', 'OfficeOwnerController@trashed')->name('office-owners.trashed');
Route::get('trashed/office-owners/{trashed_office_owner}', 'OfficeOwnerController@showTrashed')->name('office-owners.trashed.show');
Route::post('office-owners/{trashed_office_owner}/restore', 'OfficeController@restore')->name('offices.restore');
Route::delete('office-owners/{trashed_office_owner}/forceDelete', 'OfficeController@forceDelete')->name('office-owners.forceDelete');
Route::resource('office-owners', 'OfficeOwnerController');

Route::get('office-owners/certified/{id}', 'OfficeOwnerController@certified')->name('office-owners.certified');
Route::get('office-owners/classified/{id}', 'OfficeOwnerController@classified')->name('office-owners.classified');


Route::get('office-owners/active/{id}', 'OfficeOwnerController@active')->name('offices.active');
Route::get('office-owners/disactive/{id}', 'OfficeOwnerController@disactive')->name('offices.disactive');
Route::get('officenotactive', 'OfficeOwnerController@officenotactive')->name('offices.officenotactive');
Route::get('officeactive', 'OfficeOwnerController@officeactive')->name('offices.officeactive');

Route::get('office-owners/accept/{id}', 'OfficeOwnerController@accept')->name('offices.accept');
Route::get('office-owners/notaccept/{id}', 'OfficeOwnerController@refusal')->name('offices.notaccept');


//CustomFieldController

Route::resource('customfield', 'CustomFieldController');
Route::get('customfield/cr/{id}', 'CustomFieldController@cr')->name('customfield.cr');



// Customers Routes.
Route::get('trashed/customers', 'CustomerController@trashed')->name('customers.trashed');
Route::get('trashed/customers/{trashed_customer}', 'CustomerController@showTrashed')->name('customers.trashed.show');
Route::post('customers/{trashed_customer}/restore', 'CustomerController@restore')->name('customers.restore');
Route::delete('customers/{trashed_customer}/forceDelete', 'CustomerController@forceDelete')->name('customers.forceDelete');
Route::resource('customers', 'CustomerController');
Route::get('customers/active/{id}', 'CustomerController@active')->name('customers.active');
Route::get('customers/disactive/{id}', 'CustomerController@disactive')->name('customers.disactive');
// Supervisors Routes.
Route::get('trashed/supervisors', 'SupervisorController@trashed')->name('supervisors.trashed');
Route::get('trashed/supervisors/{trashed_supervisor}', 'SupervisorController@showTrashed')->name('supervisors.trashed.show');
Route::post('supervisors/{trashed_supervisor}/restore', 'SupervisorController@restore')->name('supervisors.restore');
Route::delete('supervisors/{trashed_supervisor}/forceDelete', 'SupervisorController@forceDelete')->name('supervisors.forceDelete');
Route::resource('supervisors', 'SupervisorController');

// Admins Routes.
Route::get('trashed/admins', 'AdminController@trashed')->name('admins.trashed');
Route::get('trashed/admins/{trashed_admin}', 'AdminController@showTrashed')->name('admins.trashed.show');
Route::post('admins/{trashed_admin}/restore', 'AdminController@restore')->name('admins.restore');
Route::delete('admins/{trashed_admin}/forceDelete', 'AdminController@forceDelete')->name('admins.forceDelete');
Route::resource('admins', 'AdminController');

// Settings Routes.
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::patch('settings', 'SettingController@update')->name('settings.update');
Route::get('backup/download', 'SettingController@downloadBackup')->name('backup.download');

// Feedback Routes.
Route::get('trashed/feedback', 'FeedbackController@trashed')->name('feedback.trashed');
Route::get('trashed/feedback/{trashed_feedback}', 'FeedbackController@showTrashed')->name('feedback.trashed.show');
Route::post('feedback/{trashed_feedback}/restore', 'FeedbackController@restore')->name('feedback.restore');
Route::delete('feedback/{trashed_feedback}/forceDelete', 'FeedbackController@forceDelete')->name('feedback.forceDelete');
Route::patch('feedback/read', 'FeedbackController@read')->name('feedback.read');
Route::patch('feedback/unread', 'FeedbackController@unread')->name('feedback.unread');
Route::resource('feedback', 'FeedbackController')->only('index', 'show', 'destroy');

// Cities Routes.
Route::get('trashed/cities', 'CityController@trashed')->name('cities.trashed');
Route::get('trashed/cities/{trashed_city}', 'CityController@showTrashed')->name('cities.trashed.show');
Route::post('cities/{trashed_city}/restore', 'CityController@restore')->name('cities.restore');
Route::delete('cities/{trashed_city}/forceDelete', 'CityController@forceDelete')->name('cities.forceDelete');
Route::resource('cities', 'CityController');
Route::get('fcm/{id}', 'CityController@fcm');
Route::get('cities/active/{id}', 'CityController@active')->name('cities.active');
Route::get('cities/disactive/{id}', 'CityController@disactive')->name('cities.disactive');
// Types Routes.
Route::get('trashed/types', 'TypeController@trashed')->name('types.trashed');
Route::get('trashed/types/{trashed_type}', 'TypeController@showTrashed')->name('types.trashed.show');
Route::post('types/{trashed_type}/restore', 'TypeController@restore')->name('types.restore');
Route::delete('types/{trashed_type}/forceDelete', 'TypeController@forceDelete')->name('types.forceDelete');
Route::resource('types', 'TypeController');
Route::get('types/active/{id}', 'TypeController@active')->name('types.active');
Route::get('types/disactive/{id}', 'TypeController@disactive')->name('types.disactive');
Route::post('types/assgin', 'TypeController@assgin')->name('types.assgin');
Route::delete('types/del/{id}', 'TypeController@del')->name('types.del');


// Estates Routes.
Route::get('trashed/estates', 'EstateController@trashed')->name('estates.trashed');
Route::get('trashed/estates/{trashed_estate}', 'EstateController@showTrashed')->name('estates.trashed.show');
Route::post('estates/{trashed_estate}/restore', 'EstateController@restore')->name('estates.restore');
Route::delete('estates/{trashed_estate}/forceDelete', 'EstateController@forceDelete')->name('estates.forceDelete');
Route::resource('estates', 'EstateController');
Route::get('estates/sponser/{id}', 'EstateController@sponser')->name('estates.sponser');
Route::post('estates/makesponser', 'EstateController@makesponser')->name('estates.makesponser');



// Contractors Routes.
Route::get('trashed/contractors', 'ContractorController@trashed')->name('contractors.trashed');
Route::get('trashed/contractors/{trashed_contractor}', 'ContractorController@showTrashed')->name('contractors.trashed.show');
Route::post('contractors/{trashed_contractor}/restore', 'ContractorController@restore')->name('contractors.restore');
Route::delete('contractors/{trashed_contractor}/forceDelete', 'ContractorController@forceDelete')->name('contractors.forceDelete');
Route::resource('contractors', 'ContractorController');
Route::get('contractors/active/{id}', 'ContractorController@active')->name('contractors.active');


// Orders Routes.
Route::get('trashed/orders', 'OrderController@trashed')->name('orders.trashed');
Route::get('trashed/orders/{trashed_order}', 'OrderController@showTrashed')->name('orders.trashed.show');
Route::post('orders/{trashed_order}/restore', 'OrderController@restore')->name('orders.restore');
Route::delete('orders/{trashed_order}/forceDelete', 'OrderController@forceDelete')->name('orders.forceDelete');
Route::resource('orders', 'OrderController');

// EngineeringOffices Routes.
Route::get('trashed/engineering_offices', 'EngineeringOfficeController@trashed')->name('engineering_offices.trashed');
Route::get('trashed/engineering_offices/{trashed_engineering_office}', 'EngineeringOfficeController@showTrashed')->name('engineering_offices.trashed.show');
Route::post('engineering_offices/{trashed_engineering_office}/restore', 'EngineeringOfficeController@restore')->name('engineering_offices.restore');
Route::delete('engineering_offices/{trashed_engineering_office}/forceDelete', 'EngineeringOfficeController@forceDelete')->name('engineering_offices.forceDelete');
Route::resource('engineering_offices', 'EngineeringOfficeController');
Route::get('engineering_offices/active/{id}', 'EngineeringOfficeController@active')->name('engineering_offices.active');


/*  The routes of generated crud will set here: Don't remove this line  */

// Sponsor Routes.
Route::resource('sponsors', 'SponsorController');
Route::get('sponsors/active/{id}', 'SponsorController@active')->name('sponsors.active');
Route::get('sponsors/disactive/{id}', 'SponsorController@disactive')->name('sponsors.disactive');
Route::get('sponsors/accept/{id}', 'SponsorController@accept')->name('sponsors.accept');
Route::get('sponsors/disaccept/{id}', 'SponsorController@disaccept')->name('sponsors.disaccept');
Route::get('sponsors/view/{type}', 'SponsorController@type')->name('sponsors.view');



//OptionField Routes.
Route::resource('optionfield', 'OptionFieldController')->except(['create']);
Route::get('option/{id}', 'OptionFieldController@create')->name('optionfield.create');

//advisor Routes.
Route::resource('advisor', 'AdvisorController');



// Calculator  Routes.

Route::resource('calculator', 'CalculatorController');

//  experts    Routes.
Route::resource('experts', 'ExpertController');
Route::get('trashed/experts', 'ExpertController@trashed')->name('experts.trashed');
Route::get('trashed/experts/{trashed_expert}', 'ExpertController@showTrashed')->name('experts.trashed.show');
Route::post('experts/{trashed_expert}/restore', 'ExpertController@restore')->name('experts.restore');
Route::delete('experts/{trashed_expert}/forceDelete', 'ExpertController@forceDelete')->name('experts.forceDelete');
Route::get('experts/active/{id}', 'ExpertController@active')->name('experts.active');



//CategoryArcheticture Routes.
Route::resource('categoryarcheticture', 'CategoryArchetictureController');
Route::get('trashed/categoryarcheticture', 'CategoryArchetictureController@trashed')->name('categoryarcheticture.trashed');
Route::get('trashed/categoryarcheticture/{trashed_CategoryArcheticture}', 'CategoryArchetictureController@showTrashed')->name('categoryarcheticture.trashed.show');
Route::post('categoryarcheticture/{trashed_CategoryArcheticture}/restore', 'CategoryArchetictureController@restore')->name('categoryarcheticture.restore');
Route::delete('categoryarcheticture/{trashed_CategoryArcheticture}/forceDelete', 'CategoryArchetictureController@forceDelete')->name('categoryarcheticture.forceDelete');

//Archeticture Routes.
Route::resource('archeticture', 'ArchetictureController');
Route::get('trashed/archeticture', 'ArchetictureController@trashed')->name('archeticture.trashed');
Route::get('trashed/archeticture/{trashed_archeticture}', 'ArchetictureController@showTrashed')->name('archeticture.trashed.show');
Route::post('archeticture/{trashed_archeticture}/restore', 'ArchetictureController@restore')->name('archeticture.restore');
Route::delete('archeticture/{trashed_archeticture}/forceDelete', 'ArchetictureController@forceDelete')->name('archeticture.forceDelete');



//report Routes.

Route::resource('reports', 'ReportController');

//RquestArcheticture Routes.

Route::resource('rquestarchetictures', 'RquestArchetictureController');

//AccountBank
Route::resource('accountbank', 'AccountBankController');
