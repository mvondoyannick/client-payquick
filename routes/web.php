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

//Route::get('/', function () {
//    return view('welcome');
//});

//interface de connexion
//Route::get('/', "ClientController@login");

//index de la page
Route::get('/', "ClientController@index");

//login
Route::get('/login', "ClientController@login");
Route::post('/auth', "ClientController@auth");
Route::post('/auth_code_sms', 'ClientController@auth_code_sms');

//le profile de utilisateur
Route::get('/user/profile', "ClientController@profile");

//historique de l'utilisateur
Route::get('/user/logs', "ClientController@logs");

//la securité sur le compte utilisateur
Route::get('/user/parameters/security', "ClientController@security");

//information d cartographie d l'utilisateur
Route::get('/user/maps', "ClientController@maps");

//parametre du compte utilisateur
Route::get('/user/parameters', "ClientController@parameters");