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
Route::GET('/home', 'HomeController@index')->name('home')->middleware('auth');


// /* create LIB form route */
// Route::GET('/components/LIB', 'HomeController@add_newLIB')->name('LIB')->middleware('auth');
// Route::POST('/addnew_LIB', 'HomeController@addnew_LIB')->name('addnew_LIB')->middleware('auth');

/* lib form route */
Route::GET('/components/LIB', 'crudController@viewLIB')->name('libform')->middleware('auth');
/*edit icon route*/
/* Route::GET('components/registryedit/{reg_refnum}', 'crudController@edit')->name('registry.edit'); */
/* delete icon route */
Route::GET('/home/{lib_id}', 'crudController@LIB_destroy')->name('LIBdelete')->middleware('auth');
// Route::GET('/components/printview/print_pdf/{reg_refnum}', 'crudController@printdata')->name('printdata')->middleware('auth');
/* for printing the form  */
/* Route::GET('/pdf_print/{reg_refnum}/pdf', 'viewandprint@print_pdf')->name('printregistry'); */
/* insert registry data route */
Route::POST('/LIBformstore', 'crudController@LIB_store')->name('LIBformstore')->middleware('auth');
/* update registry data after edit route */
Route::PATCH('/LIBupdate/{lib_id}', 'crudController@LIB_update')->name('LIBupdate')->middleware('auth');



/* create project form route */
// Route::GET('/components/createproject', 'HomeController@add_newproject')->name('createproject')->middleware('auth');
// Route::POST('/addnew_project', 'HomeController@addnew_project')->name('addnew_project')->middleware('auth');

/* Project form route */
Route::GET('/components/Project', 'crudController@viewProject')->name('projectform')->middleware('auth');
/*edit icon route*/
/* Route::GET('components/registryedit/{reg_refnum}', 'crudController@edit')->name('registry.edit'); */
/* delete icon route */
Route::GET('/home/{project_id}', 'crudController@project_destroy')->name('projectdelete')->middleware('auth');
// Route::GET('/components/printview/print_pdf/{reg_refnum}', 'crudController@printdata')->name('printdata')->middleware('auth');
/* for printing the form  */
/* Route::GET('/pdf_print/{reg_refnum}/pdf', 'viewandprint@print_pdf')->name('printregistry'); */
/* insert registry data route */
Route::POST('/projectformstore', 'crudController@project_store')->name('projectformstore')->middleware('auth');
/* update registry data after edit route */
Route::PATCH('/projectupdate/{project_id}', 'crudController@project_update')->name('projectupdate')->middleware('auth');







/* registry form route */
Route::GET('/components/Registry', 'crudController@viewpage')->name('registryform')->middleware('auth');
/*edit icon route*/
/* Route::GET('components/registryedit/{reg_refnum}', 'crudController@edit')->name('registry.edit'); */
/* delete icon route */
Route::GET('/home/{reg_refnum}', 'crudController@destroy')->name('registrydelete')->middleware('auth');
Route::GET('/components/printview/print_pdf/{reg_refnum}', 'crudController@printdata')->name('printdata')->middleware('auth');
/* for printing the form  */
/* Route::GET('/pdf_print/{reg_refnum}/pdf', 'viewandprint@print_pdf')->name('printregistry'); */
/* insert registry data route */
Route::POST('/registryformstore', 'crudController@store')->name('registryformstore')->middleware('auth');
/* update registry data after edit route */
Route::PATCH('/registryupdate/{reg_refnum}', 'crudController@update')->name('registryupdate')->middleware('auth');



Route::GET('/components/table-list', 'crudController@table_list')->name('table_list')->middleware('auth');

Route::post('/daterange/fetch_data', 'HomeController@fetch_data')->name('daterange.fetch_data')->middleware('auth');

Route::GET('/components/bursregistry', 'crudController@viewbursregistry')->name('viewburs')->middleware('auth');

Route::POST('/burs_registryformstore', 'crudController@burs_store')->name('burs_registryformstore')->middleware('auth');

Route::PATCH('/burs_registryupdate/{reg_refnum}', 'crudController@burs_update')->name('burs_registryupdate')->middleware('auth');

Route::GET('/components/printview/print_pdf2/{reg_refnum}', 'crudController@burs_printdata')->name('burs_printdata')->middleware('auth');

//addnew page

Route::GET('/components/addnew', 'HomeController@add_new')->name('addnew')->middleware('auth');

Route::POST('/addnew_payee', 'HomeController@addnew_payee')->name('addnew_payee')->middleware('auth');

Route::POST('/addnew_rc', 'HomeController@addnew_rc')->name('addnew_rc')->middleware('auth');

Route::POST('/addnew_uacs', 'HomeController@addnew_uacs')->name('addnew_uacs')->middleware('auth');

Route::POST('/addnew_pap', 'HomeController@addnew_pap')->name('addnew_pap')->middleware('auth');

//about us page
Route::GET('/components/aboutus', 'crudController@aboutus')->name('aboutus')->middleware('auth');

//cancelled registries ors/burs

Route::GET('/components/cancelledregistries', 'HomeController@viewcancelled')->name('viewcancelled')->middleware('auth');

Route::GET('/cancel/{reg_refnum}', 'HomeController@cancel')->name('cancel')->middleware('auth');

Route::GET('/cancel_burs/{reg_refnum}', 'HomeController@cancel_burs')->name('cancel_burs')->middleware('auth');

//cancelled LIB or Program/Project

Route::GET('/cancel_LIB/{lib_id}', 'HomeController@cancel_LIB')->name('cancel_LIB')->middleware('auth');

Route::GET('/cancel_project/{project_id}', 'HomeController@cancel_project')->name('cancel_project')->middleware('auth');

//Add Budget

Route::POST('/add_budget', 'HomeController@add_budget')->name('add_budget')->middleware('auth');    //ORS
Route::POST('/add_budget2', 'HomeController@add_budget2')->name('add_budget2')->middleware('auth');    //BURS

//monthly_summary

Route::GET('/components/monthly_summary', 'HomeController@monthly_summary')->name('monthly_summary')->middleware('auth');
Route::GET('/components/printview/print_pdf3', 'HomeController@monthly_summary_print')->name('monthly_summary_print')->middleware('auth');

Route::POST('/monthly_store', 'homeController@monthly_store')->name('monthly_store');

//monthly_summary print
Route::GET('components/monthlyprint/{monthly_id}', 'crudController@monthly_edit')->name('monthly.edit');


//table-list_burs
Route::GET('/components/table-list_burs', 'crudController@table_list_burs')->name('table_list_burs')->middleware('auth');
Route::post('/daterange/fetch_data_burs', 'crudController@fetch_data_burs')->name('daterange.fetch_data_burs')->middleware('auth');

//monthly table delete
Route::GET('/components/monthly_summary/{monthly_id}', 'homeController@destroy')->name('monthlydelete')->middleware('auth');



