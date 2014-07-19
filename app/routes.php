<?php

$NS = 'App\\Controllers\\';

Route::get('/', 'App\\Controllers\\LoginController@index');
Route::get('/login', 'App\\Controllers\\LoginController@index');
Route::get('/login/logout', 'App\\Controllers\\LoginController@doLogout');
Route::post('/login/proses', 'App\\Controllers\\LoginController@ProsesLogin');

Route::get('/test', $NS . 'TestController@view');
Route::get('/kosong', $NS . 'TestController@kosong');
Route::get('/test/tambah', $NS . 'TestController@add');
Route::post('/test/add', $NS . 'TestController@addProses');
Route::get('/test/edit/{id}', $NS . 'TestController@edit');
Route::post('/test/update/{id}',$NS.'TestController@prosesUpdate');
Route::get('/test/delete/{id}', $NS . 'TestController@delete');

Route::get('/buku',$NS.'BukuController@view');
Route::get('/buku/add',$NS.'BukuController@add');
Route::post('/buku/add/proses',$NS.'BukuController@addProses');
Route::get('/buku/edit/{id}',$NS.'BukuController@edit');

Route::post('/buku/edit/proses/{id}',$NS.'BukuController@editProses');

Route::get('/buku/delete/{id}',$NS.'BukuController@delete');


Route::get('/penulis',$NS.'PenulisController@penulisView');
Route::get('/penulis/add',$NS.'PenulisController@penulisAdd');
Route::post('/penulis/proses_add',$NS.'PenulisController@prosesAdd');
Route::get('/penulis/edit/{id}',$NS.'PenulisController@penulisEdit');
Route::post('/penulis/edit/proses/{id}',$NS.'PenulisController@editProses');
Route::get('/penulis/delete/{id}',$NS.'PenulisController@PenulisDelete');


Route::get('/penerbit', $NS . 'PenerbitController@view');
Route::get('/penerbit/cari',$NS . 'PenerbitController@cari');
Route::get('/penerbit/add', $NS . 'PenerbitController@add');
Route::post('/penerbit/addProses', $NS . 'PenerbitController@addProses');
Route::get('/penerbit/edit/{id}', $NS . 'PenerbitController@Edit');
Route::post('/penerbit/EditProses/{id}', $NS . 'PenerbitController@EditProses');
Route::get('/penerbit/delete/{id}', $NS . 'PenerbitController@delete');

Route::get('/tampilkan',$NS.'PenerbitControlle1@View');
Route::get('/tampilkan/add',$NS.'PenerbitControlle1@add');
Route::get('/tampilkan/addProses',$NS.'PenerbitControlle1@addProses');





