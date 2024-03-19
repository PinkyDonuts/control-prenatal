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

Route::get('/', function () {
    return view('admin.login');
})->name('login');

Route::get('/migrar' , 'AdminController@migrar');
Route::get('/logout' , 'AdminController@logout');
Route::get('/back-up' , 'AdminController@backUpDB');

Route::post('/admin/login' , 'AdminController@login');


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/admin'] , function(){
        Route::get('/home' , 'AdminController@home');
        Route::get('/control-add' , 'AdminController@controlAdd');
        Route::get('/control-index' , 'AdminController@controlIndex');
        Route::get('/control-edit/{id}' , 'AdminController@controlEdit');
        Route::get('/users/delete/{id}' , 'AdminController@controlDelete');
        Route::get('/control-view/{id}' , 'AdminController@controlView');
        Route::get('/control-index/filter' , 'AdminController@controlIndexFilter');
        Route::get('/control-index/back-up' , 'AdminController@backUp');
        Route::get('/edit-perfil' , 'AdminController@editPerfil');
        Route::get('/export-users-excel' , 'AdminController@exportUsersExcel');
        Route::get('/export-stats-pdf' , 'AdminController@exportStatsPdf');

        Route::post('/control-add' , 'AdminController@postControlAdd');
        Route::post('/edit-perfil' , 'AdminController@postEditPerfil');
    });
});
