<?php

use App\Municipio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//Site
Route::get('/', 'Site\HomeController@index')->name('site.home');
Route::get('/vaga/{id}', 'Site\VagasController@show')->name('site.vagas.show');
Route::get('/vagas', 'Site\VagasController@vagas')->name('site.vagas');


//Cadastro de empresas home
Route::get('/login', 'Site\LoginController@index')->name('site.login');
Route::get('/candidato/login', 'Site\LoginController@indexCandidato')->name('site.login.candidato');
Route::get('/empresa/login', 'Site\LoginController@indexEmpresa')->name('site.login.empresa');

Route::post('/login/empresa', 'Site\CadEmpresaController@store')->name('empresa.create.store');

//Cadastro de Usuário home
Route::post('/login/usuario', 'Site\CadUsuarioController@store')->name('usuario.create.store');


/**Verifica e-mail */
Route::get('/dashboard/email/empresa/{email}', 'Site\LoginController@VerificaEmailEmpresa')->name('empres.verifica.email');
Route::get('/dashboard/email/usuario/{email}', 'Site\LoginController@VerificaEmailUsuario')->name('usuario.verifica.email');


Route::group(['prefix' => 'admin/'], function () {

    Route::get('/login', 'Admin\LoginController@index')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@store')->name('admin.store.login');
    Route::post('/sair', 'Admin\LoginController@sair')->name('admin.sair');

    /**Dashboard */
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    /**Gerenciar Usuários*/
    Route::get('/usuarios', 'Admin\GerenciarUsuariosController@index')->name('admin.gerenciar.usuarios');
    Route::get('/usuario/create', 'Admin\GerenciarUsuariosController@create')->name('admin.gerenciar.create');
    Route::post('/usuario/store', 'Admin\GerenciarUsuariosController@store')->name('admin.gerenciar.store');
    Route::get('/usuario/edit/{id}', 'Admin\GerenciarUsuariosController@edit')->name('admin.gerenciar.edit');
    Route::put('/usuario/edit/update/', 'Admin\GerenciarUsuariosController@update')->name('admin.gerenciar.update');
    Route::get('/usuario/delete/{id}', 'Admin\GerenciarUsuariosController@deletar')->name('admin.gerenciar.deletar');

    /**Gerenciar Empresas*/
    Route::get('/empresas', 'Admin\GerenciarEmpresasController@index')->name('admin.gerenciar.empresas');
    Route::get('/empresa/create', 'Admin\GerenciarEmpresasController@create')->name('admin.gerenciar.empresa.create');
    Route::post('/empresa/store', 'Admin\GerenciarEmpresasController@store')->name('admin.gerenciar.empresa.store');
    Route::get('/empresa/edit/{id}', 'Admin\GerenciarEmpresasController@edit')->name('admin.gerenciar.empresa.edit');
    Route::put('/empresa/edit/update', 'Admin\GerenciarEmpresasController@update')->name('admin.gerenciar.empresa.update');

    /**Gerenciar Vagas */
    Route::get('/vagas', 'Admin\GerenciarVagaController@index')->name('admin.gerenciar.vagas');
    Route::get('/vaga/create', 'Admin\GerenciarVagaController@create')->name('admin.gerenciar.vaga.create');
    Route::post('/vaga/store', 'Admin\GerenciarVagaController@store')->name('admin.gerenciar.vaga.store');
    Route::get('/vaga/edit/{id}', 'Admin\GerenciarVagaController@edit')->name('admin.gerenciar.vaga.edit');
    Route::put('/vaga/edit/update', 'Admin\GerenciarVagaController@update')->name('admin.gerenciar.vaga.update');
});






/**Empresa */
Route::group(['prefix' => 'empresa/'], function () {

    Route::post('login', 'Empresa\LoginController@login')->name('empresa.login');
    Route::post('sair', 'Empresa\LoginController@sair')->name('empresa.sair');
    Route::get('dashboard', 'Empresa\EmpresaController@index')->name('empresa.dashboard');
    Route::post('dashboard', 'Empresa\EmpresaController@StoreProfile')->name('empresa.store.perfil');

    Route::get('dashboard/delLinks/{idlinks}', 'Empresa\EmpresaController@delLinks')->name('empresa.delLinks');

    Route::post('dashboard/vaga/store', 'Empresa\EmpresaVagaController@store')->name('empresa.vaga.store');
    Route::get('dashboard/vaga/edit/{id}', 'Empresa\EmpresaVagaController@edit')->name('empresa.vaga.edit');
    Route::post('dashboard/vaga/update', 'Empresa\EmpresaVagaController@update')->name('empresa.vaga.update');
    Route::get('dashboard/vaga/delete/{id}', 'Empresa\EmpresaVagaController@delete')->name('empresa.vaga.delete');

    Route::get('dashboard/exportar/candidatos/', 'Empresa\EmpresaVagaController@export')->name('exportar.candidatos.excel');
});


Route::group(['prefix' => 'usuario/'], function () {

    Route::post('login', 'Usuario\LoginController@login')->name('usuario.login');
    Route::post('sair', 'Usuario\LoginController@sair')->name('usuario.sair');
    Route::get('dashboard/delLinks/{idlinks}', 'Usuario\UsuarioController@delLinks')->name('usuario.delLinks');
    Route::get('dashboard/', 'Usuario\UsuarioController@dashboard')->name('usuario.dashboard');
    Route::post('dashboard/', 'Usuario\UsuarioController@StoreProfile')->name('usuario.store.perfil');
    Route::post('dashboard/add/experiencia', 'Usuario\UsuarioController@AdicionaExperiencia')->name('usuario.add.experiencia');
    Route::post('dashboard/add/formacao', 'Usuario\UsuarioController@AdicionaFormacao')->name('usuario.add.formacao');
    Route::post('dashboard/add/voluntario', 'Usuario\UsuarioController@AdicionaVoluntario')->name('usuario.add.voluntario');

    Route::get('dashboard/get/experiencia/{id}', 'Usuario\UsuarioController@getExperiencia')->name('usuario.get.experiencia');
    Route::post('dashboard/edit/experiencia/update', 'Usuario\UsuarioController@UpdateExperiencie')->name('usuario.update.experiencia');
    Route::get('dashboard/get/formacao/{id}', 'Usuario\UsuarioController@getFormacao')->name('usuario.get.formacao');
    Route::post('dashboard/edit/formacao/update', 'Usuario\UsuarioController@UpdateFormacao')->name('usuario.update.formacao');
    Route::get('dashboard/get/voluntario/{id}', 'Usuario\UsuarioController@getVoluntario')->name('usuario.get.voluntario');
    Route::post('dashboard/edit/voluntario/update', 'Usuario\UsuarioController@UpdateVoluntario')->name('usuario.update.voluntario');

    Route::get('dashboard/candidatarse/vaga/{id}', 'Usuario\UsuarioController@candidatar')->name('usuario.candidatar.vaga');
    Route::get('dashboard/cancelarcandidatura/vaga/{id}', 'Usuario\UsuarioController@cancelarCandidatura')->name('usuario.cancelar-candidatura.vaga');
});
