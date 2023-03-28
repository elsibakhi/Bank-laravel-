<?php

use Illuminate\Support\Facades\Route;


// ------------------- empolyee






Route::resource('empolyee','EmpolyeeController');
Route::get('page/delete', 'EmpolyeeController@showDelete')->name("empolyee.delete.page");
Route::get('page/delete/{selectedID}', 'EmpolyeeController@destroy')->name("client.delete.action");


Route::get('page/restore', 'EmpolyeeController@showTrash')->name("empolyee.restore.page");
Route::get('page/restore/{selectedID}', 'EmpolyeeController@restore')->name("client.restore.action");

Route::get('page/edit', 'EmpolyeeController@edit')->name("empolyee.edit");
Route::get('page/search/Clients', 'EmpolyeeController@searchClients')->name("empolyee.search");
Route::get('page/search/Clients/transaction{personal_id}/{page?}', 'EmpolyeeController@searchClientsTransactions')->name("empolyee.search.transaction");
Route::post('page/empolyee/complaints', 'EmpolyeeController@sendComplaints')->name("complaints");
Route::get('page/empolyee/profile', 'EmpolyeeController@profilePage')->name("empolyee.profile");
Route::get('page/empolyee/complaintsPage', 'EmpolyeeController@complaintsPage')->name("emoplyee.complaints");

Route::post('empolyee/profile/update', 'EmpolyeeController@updateProfile')->name('empolyee.update.profile');
Route::post('empolyee/password/update', 'EmpolyeeController@updatePassword')->name('empolyee.change.password');

Route::get('empolyee/delete/complaint{id}', 'EmpolyeeController@deleteComplaint')->name('emoplyee.delete.complaint');
// for empolyee 
Route::get('empolyee/page/withdrawPage/{id}', 'EmpolyeeController@withdrawPage')->name("empolyee.withdraw.page");
Route::get('empolyee/page/depositPage/{id}', 'EmpolyeeController@depositPage')->name("empolyee.deposit.page");
Route::get('empolyee/page/transferPage/{id}', 'EmpolyeeController@transferPage')->name("empolyee.transfer.page");
Route::post('empolyee/page/trnsactionsPage/next{id?}', 'EmpolyeeController@nextTransactionsPage')->name("client.trnsactions.page.next");
Route::get('empolyee/page/trnsactionsPage/next{id?}', 'EmpolyeeController@nextTransactionsPage')->name("client.trnsactions.page.next");
Route::get('empolyee/page/trnsactionsReports', 'EmpolyeeController@trnsactionsReports')->name('client.trnsactionsReports.page');
Route::get('empolyee/page/clientReports', 'EmpolyeeController@clientReports')->name('client.trnsactions.report');

Route::get('page/trnsactionsPage', 'EmpolyeeController@transactionsPage')->name("client.trnsactions.page");
Route::post('empolyee/page/withdraw', 'EmpolyeeController@withdraw')->name("empolyee.withdraw");
Route::post('empolyee/page/deposit', 'EmpolyeeController@deposit')->name("empolyee.deposit");
Route::post('empolyee/page/transfer', 'EmpolyeeController@transfer')->name("empolyee.transfer");



// update client 
Route::post('empolyee/client/update{id?}', 'EmpolyeeController@updateClient')->name("empolyee.update.client");
