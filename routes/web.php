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

Route::resource('/login','LoginController');

Route::get('conta/login', 'LoginController@formLogin')->name('loginForm');
Route::post('conta/login', 'LoginController@login')->name('login.post');
Route::post('conta/register', 'LoginController@register')->name('register.post');

Route::get('/loginPost','LoginController@login')->name('login.login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/paciente/cadastro-rapido', function(){
        dd('teste');
    })->name('cadastroRapido');

    Route::resource('/paciente','PacienteController');
    Route::resource('/estabelecimento','EstabelecimentoController');
    Route::resource('/internacao','InternacaoController');
    Route::resource('/setor','SetorController');
    Route::resource('/dados-clinicos','DadosClinicosController');
    Route::resource('/leitos','LeitoController');
    Route::resource('/configuracao','ConfiguracaoController');
    Route::resource('/perfil','PerfisController');
    Route::resource('/usuario','UsuarioController');
    Route::post('/usuario','UsuarioController@registrarUsuario')->name('usuario.registrarUsuario');
    Route::post('/paciente/{paciente}','PacienteController@update')->name('paciente.updates');

    Route::get('/internacao/dados-clinicos/{idInternacao}','InternacaoController@dadosClinicos')->name('internacao.dadosClinicos');
    Route::get('/dados-clinicos/criar/{idInternacao}','DadosClinicosController@create')->name('internacao.dadosClinicos.create');

    Route::get('/listaSetores/{idEstabelecimento}', 'SetorController@listaSetores')->name('setores.lista');
    Route::get('/listaLeitos/{idLeito}', 'LeitoController@listaLeitos')->name('leitos.lista');

    //login
    Route::get('conta/logout', 'LoginController@logout')->name('logout');
});

