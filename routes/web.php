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
    return view('welcome');
});
Route::get('create', function () {
    return view('create');
});



Route::get('Getdata','companyworklocationcontroller@index');




Route::get('createdate', function () {
    return view('date');
});
/*Route::get('date', function () {
    return view('index2');
});*/

Route::get('date','companyworklocationcontroller@date');
Route::post('selectdropdowndata','companyworklocationcontroller@selectdropdowndata');


Route::get('Autofilldropdowndata','companyworklocationcontroller@Dropdown');
