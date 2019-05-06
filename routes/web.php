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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->group(function($adminRoutes) {
    $adminRoutes->resource('pessoas', 'PeopleController',['as' => 'admin']);
    $adminRoutes->resource('usuarios', 'UsersController',['as' => 'admin']);

    $adminRoutes->get('relatorios', 'ReportsController@index')->name('admin.relatorios.index');
    $adminRoutes->post('relatorios/gerar', 'ReportsController@generate_report')->name('admin.relatorios.gerar');
});

Route::namespace('Web')->group(function($webRoutes){
    $webRoutes->get('sucesso', 'PeopleController@confirmation')->name('web.pessoas.sucesso');
    $webRoutes->get('cadastro-pessoas', 'PeopleController@create')->name('web.pessoas.create');
    $webRoutes->post('cadastro-pessoas', 'PeopleController@store')->name('web.pessoas.store');
});

Route::namespace('Endpoints')->prefix('endpoints')->group(function($eptRoutes){
    $eptRoutes->get('cidades/{cidade}', 'PeopleEndpointsController@cidades');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
