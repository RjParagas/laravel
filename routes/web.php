<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HaulerController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AssignedScheduleController;
use App\Http\Controllers\WasteCollectedController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\WasteRecycledController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

//Route::get('/home/customer', [App\Http\Controllers\HomeController::class, 'customer'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

//Route::view('customers','customers');

Route::view('reports','reports');


//Hauler information/account
Route::get('hauler',[HaulerController::class, 'index']);
Route::get('truck',[HaulerController::class, 'index']);
Route::get('add-hauler',[HaulerController::class, 'create']);
Route::post('add-hauler',[HaulerController::class, 'store']);
Route::get('edit-hauler/{id}',[HaulerController::class, 'edit']);
Route::put('update-hauler/{id}',[HaulerController::class, 'update']);
Route::get('delete-hauler/{id}',[HaulerController::class, 'destroy']);
Route::get('hauler', [App\Http\Controllers\HaulerController::class, 'index'])->name('hauler');

//truck details 
Route::get('truck',[TruckController::class, 'index']);
Route::get('add-truck',[TruckController::class, 'create']);
Route::post('add-truck',[TruckController::class, 'store']);
Route::get('edit-truck/{id}',[TruckController::class, 'edit']);
Route::put('update-truck/{id}',[TruckController::class, 'update']);
Route::get('delete-truck/{id}',[TruckController::class, 'destroy']);
Route::get('truck', [App\Http\Controllers\TruckController::class, 'index'])->name('truck');

//Post details 
Route::get('post',[PostController::class, 'index']);
Route::get('add-post',[PostController::class, 'create']);
Route::post('add-post',[PostController::class, 'store']);
Route::get('edit-post/{id}',[PostController::class, 'edit']);
Route::put('update-post/{id}',[PostController::class, 'update']);
Route::get('delete-post/{id}',[PostController::class, 'destroy']);
Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post');

//Report details 
Route::get('report',[ReportController::class, 'index']);
Route::get('add-report',[ReportController::class, 'create']);
Route::post('add-report',[ReportController::class, 'store']);
Route::get('edit-report/{id}',[ReportController::class, 'edit']);
Route::put('update-report/{id}',[ReportController::class, 'update']);
Route::get('delete-report/{id}',[ReportController::class, 'destroy']);
Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');

//RAtings details 
Route::get('ratings',[RatingsController::class, 'index']);
Route::get('add-ratings',[RatingsController::class, 'create']);
Route::post('add-ratings',[RatingsController::class, 'store']);
Route::get('edit-ratings/{id}',[RatingsController::class, 'edit']);
Route::put('update-ratings/{id}',[RatingsController::class, 'update']);
Route::get('delete-ratings/{id}',[RatingsController::class, 'destroy']);
Route::get('ratings', [App\Http\Controllers\RatingsController::class, 'index'])->name('ratings');



//schedule details 
Route::get('schedule',[ScheduleController::class, 'index']);
Route::get('add-schedule',[ScheduleController::class, 'create']);
//Route::post('add-schedule',[ScheduleController::class, 'store']);
Route::get('edit-schedule/{id}',[ScheduleController::class, 'edit']);
Route::put('update-schedule/{id}',[ScheduleController::class, 'update']);
Route::put('update1-schedule/{id}',[ScheduleController::class, 'update1']);
Route::get('delete-schedule/{id}',[ScheduleController::class, 'destroy']);
//assign 

Route::get('assigned-schedule/{id}',[ScheduleController::class, 'edit2']);
//Route::get('edit-schedule/{id}',[ScheduleController::class, 'edit2']);
Route::post('store-schedule',[ScheduleController::class, 'store']);

Route::get('schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

//assignedSchedule details 
Route::get('assignedSchedule',[AssignedScheduleController::class, 'index']);
Route::get('add-assignedSchedule',[AssignedScheduleController::class, 'create']);
Route::post('add-assignedSchedule',[AssignedScheduleController::class, 'store']);
Route::get('edit-assignedSchedule/{id}',[AssignedScheduleController::class, 'edit']);
Route::put('update-assignedSchedule/{id}',[AssignedScheduleController::class, 'update']);
Route::get('delete-assignedSchedule/{id}',[AssignedScheduleController::class, 'destroy']);
Route::get('assignedSchedule', [App\Http\Controllers\AssignedScheduleController::class, 'index'])->name('assignedSchedule');

//WasteCollected details
Route::get('wasteCollected',[WasteCollectedController::class, 'index']);
Route::get('add-wasteCollected',[WasteCollectedController::class, 'create']);
Route::post('add-wasteCollected',[WasteCollectedController::class, 'store']);
Route::get('edit-wasteCollected/{id}',[WasteCollectedController::class, 'edit']);
Route::put('update-wasteCollected/{id}',[WasteCollectedController::class, 'update']);
Route::get('delete-wasteCollected/{id}',[WasteCollectedController::class, 'destroy']);
Route::get('wasteCollected', [App\Http\Controllers\WasteCollectedController::class, 'index'])->name('wasteCollected');

//WasteRecycled details
Route::get('wasteRecycled',[WasteRecycledController::class, 'index']);
Route::get('add-wasteRecycled',[WasteRecycledController::class, 'create']);
Route::post('add-wasteRecycled',[WasteRecycledController::class, 'store']);
Route::get('edit-wasteRecycled/{id}',[WasteRecycledController::class, 'edit']);
Route::put('update-wasteRecycled/{id}',[WasteRecycledController::class, 'update']);
Route::get('delete-wasteRecycled/{id}',[WasteRecycledController::class, 'destroy']);
Route::get('wasteRecycled', [App\Http\Controllers\WasteRecycledController::class, 'index'])->name('wasteRecycled');

//history details
Route::get('history',[HistoryController::class, 'index']);
Route::get('add-history',[HistoryController::class, 'create']);
Route::post('add-history',[HistoryController::class, 'store']);
Route::get('edit-history/{id}',[HistoryController::class, 'edit']);
Route::put('update-history/{id}',[HistoryController::class, 'update']);
Route::get('delete-history/{id}',[HistoryController::class, 'destroy']);
Route::get('history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');

Route::get('home', [CountController::class, 'index'])->name('home');
