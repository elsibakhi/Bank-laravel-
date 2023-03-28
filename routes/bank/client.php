<?php

use Illuminate\Support\Facades\Route;


// ------------------- client
Route::resource('client','ClientController');


Route::get('page/complaintPage', 'ClientController@complaintPage')->name("client.complaint.page");
Route::get('page/client/profilePage', 'ClientController@profilePage')->name("client.profile.page");
Route::get('page/client/dashboardPage', 'ClientController@dashboardPage')->name("client.dashboard.page");
Route::get('getCurrentPageRoute', 'ClientController@getCurrentPageRoute')->name("client.curr.route");
Route::get('get_nav_active_session', 'ClientController@get_nav_active_session')->name("client.nav.active");
Route::post('client/profile/update', 'ClientController@updateProfile')->name('client.update.profile');
Route::post('client/complaint', 'ClientController@complaint')->name("client.complaint");

// for client 
Route::get('page/withdrawPage/{id}', 'ClientController@withdrawPage')->name("client.withdraw.page");
Route::get('page/depositPage/{id}', 'ClientController@depositPage')->name("client.deposit.page");
Route::get('page/transferPage/{id}', 'ClientController@transferPage')->name("client.transfer.page");


Route::post('page/withdraw', 'ClientController@withdraw')->name("client.withdraw");
Route::post('page/deposit', 'ClientController@deposit')->name("client.deposit");
Route::post('page/transfer', 'ClientController@transfer')->name("client.transfer");



// photo 

Route::post('photo/upload', 'photoController@upload')->name("photo.upload");
Route::delete('photo/delete', 'photoController@delete')->name("photo.delete");