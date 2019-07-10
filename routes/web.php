<?php

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

Route::GET('/', function () {
    return redirect('login');
});

Auth::routes();
/* registry dashboard after acc login route */
Route::GET('/home', 'HomeController@index')->name('home');
/* registry form form route */
Route::GET('/components/Registry', 'crudController@viewpage')->name('registryform');
/*edit icon route*/
Route::GET('/registry/{reg_refnum}/edit', 'crudController@edit')->name('registry.edit');
/* delete icon route */
Route::GET('/home/{reg_refnum}', 'crudController@destroy')->name('registrydelete');
Route::GET('/components/printview/print_pdf/{reg_refnum}' . 'orsreceipt', 'crudController@printdata')->name('printdata');
/* for printing the form  */
/* Route::GET('/pdf_print/{reg_refnum}/pdf', 'viewandprint@print_pdf')->name('printregistry'); */
/* insert registry data route */
Route::POST('/registryformstore', 'crudController@store')->name('registryformstore');
/* update registry data after edit route */
Route::PATCH('/registryupdate/{reg_refnum}', 'crudController@update')->name('registryupdate');

Route::GET('/components/table-list', 'crudController@table_list')->name('table_list');
/* //Comment on production
Route::get('/examples', function () {
if (Auth::check()) {
return view('examples/home');
} else {
return redirect('login');
}

});
Route::get('/examples/user-profile', function () {
return view('examples/user-profile');
});
Route::get('/examples/table-list', function () {
return view('examples/table-list');
});
Route::get('/examples/typography', function () {
return view('examples/typography');
});
Route::get('/examples/icons', function () {
return view('examples/icons');
});
Route::get('/examples/maps', function () {
return view('examples/maps');
});
Route::get('/examples/notifications', function () {
return view('examples/notifications');
});
Route::get('/examples/upgrade', function () {
return view('examples/upgrade');
});
Route::get('/examples/charts', function () {
return view('examples/charts');
}); */
//End Comment on production
Route::post('/daterange/fetch_data', 'HomeController@fetch_data')->name('daterange.fetch_data');