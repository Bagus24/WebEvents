<?php

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return view('admin');
})->name('adminpage');

Route::get('admin-login','AdminLoginController@showLoginForm');

Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'AdminLoginController@login']);

Route::get('admin-register','AdminLoginController@showRegisterPage');

Route::post('admin-register', 'AdminLoginController@register')->name('admin.register');

Route::get('/showAkun', 'HomeController@showAkun');

Route::get('/showEvent', 'HomeController@showEvent');

Route::get('/showJadwal', 'HomeController@showJadwal');

Route::get('/create-event', 'HomeController@createEvent');

Route::post('/daftarPeserta', 'HomeController@daftarPeserta');

Route::post('/postEvent', 'HomeController@postEvent');

Route::get('/deskripsi-event', 'GuestController@deskripsiEvent');

