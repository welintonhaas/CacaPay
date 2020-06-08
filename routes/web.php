<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::get('/cadastro/cliente', 'ClienteController@cadastro')->name('cad_cliente');
Route::post('/cadastrar/cliente', 'ClienteController@cadastrar')->name('cadastrar_cliente');

Route::middleware(['auth'])->group(function (){
    
    Route::get('/pagamentos', 'HomeController@pagamentos')->name('pagamentos')->middleware('auth');

    Route::prefix('cadastro')->group(function () {
        Route::get('/empresa', 'EmpresaController@cadastro')->name('cad_empresa')->middleware('auth');
        Route::get('/credito', 'CreditoController@cadastro')->name('cad_credito')->middleware('auth');
        Route::get('/status', 'StatusController@cadastro')->name('cad_status')->middleware('auth');
    });

    Route::prefix('cadastrar')->group(function () {
        Route::post('/empresa', 'EmpresaController@cadastrar')->name('cadastrar_empresa')->middleware('auth');
        Route::post('/credito', 'CreditoController@cadastrar')->name('cadastrar_credito')->middleware('auth');
        Route::post('/status', 'StatusController@cadastrar')->name('cadastrar_status')->middleware('auth');
    });
});
