<?php

use Illuminate\Support\Facades\Route;


//  -------------------- admin ----------------------
Route::get('/Admin/home', 'AdminController@index')->name('admin.dashboard');
Route::get('/Admin/detailsPage{id}', 'AdminController@detailsPage')->name('admin.details');
Route::get('/Admin/profilePage', 'AdminController@profilePage')->name('admin.profile');
Route::post('/Admin/profile/update', 'AdminController@updateProfile')->name('admin.profile.update');
Route::post('/Admin/replay{id}', 'AdminController@replay')->name('admin.replay');
Route::get('/Admin/delete/replay{id}', 'AdminController@deleteReplay')->name('delete.replay');
Route::get('/Admin/delete/complaint{id}', 'AdminController@deleteComplaint')->name('delete.complaint');
Route::get('/Admin/Admin/filterTransactions', 'AdminController@filterTransactions')->name('admin.filter.transactions');
Route::get('/Admin/get/refresh', 'AdminController@refreshDashboard')->name('admin.refresh.Dashboard');


