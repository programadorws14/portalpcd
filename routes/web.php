<?php

use App\Municipio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Site
Route::get('/', 'Site\HomeController@index')->name('site.home');
Route::get('/cadastrar-cv', 'Site\CadUsuarioController@CadastrarUsuario')->name('site.cadastrar.usuario');
Route::get('/vagas/{idempresa}', 'Site\VagasController@index')->name('site.vagas.index');

Route::get('/login', 'Site\LoginController@index')->name('site.login');
Route::post('/login', 'Site\CadEmpresaController@store')->name('empresa.create.store');


//Rotas ADM / EMPRESA / USUARIO
Route::group(['prefix' => 'admin/'], function () {

    Route::get('login', 'Admin\LoginController@index')->name('admin.login');
    Route::post('login', 'Admin\LoginController@store')->name('admin.store');
    Route::post('sair', 'Admin\LoginController@sair')->name('admin.sair');

    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('empresa/create', 'Admin\GerenciarEmpresaController@Create')->name('admin.empresa.create');
    Route::post('empresa/store', 'Admin\GerenciarEmpresaController@Store')->name('admin.empresa.store');
    Route::get('empresa/edit/{id}', 'Admin\GerenciarEmpresaController@Edit')->name('admin.empresa.edit');
    Route::post('empresa/update', 'Admin\GerenciarEmpresaController@Update')->name('admin.empresa.update');
    Route::get('empresa/delete/{id}', 'Admin\GerenciarEmpresaController@Delete')->name('admin.empresa.delete');

    Route::get('empresa/pendentes', 'Admin\GerenciarEmpresaController@Pendente')->name('admin.empresa.pendente');
    Route::get('empresa/listar', 'Admin\GerenciarEmpresaController@Listar')->name('admin.empresa.listar');
    Route::get('empresa/recusadas', 'Admin\GerenciarEmpresaController@Recusadas')->name('admin.empresa.recusadas');
    Route::get('empresa/detalhes/{id}', 'Admin\GerenciarEmpresaController@Detalhes')->name('admin.empresa.detalhes');
    Route::get('empresa/aprovar/{id}', 'Admin\GerenciarEmpresaController@Aprovar')->name('admin.empresa.aprovar');
    Route::get('empresa/recusar/{id}', 'Admin\GerenciarEmpresaController@Recusar')->name('admin.empresa.recusar');

    Route::get('vaga/pendente', 'Admin\GerenciarVagaController@pendente')->name('admin.vaga.pendente');
    Route::get('vaga/listar', 'Admin\GerenciarVagaController@listar')->name('admin.vaga.listar');
    Route::get('vaga/recusadas', 'Admin\GerenciarVagaController@recusadas')->name('admin.vaga.recusadas');
    Route::get('vaga/detalhes/{id}', 'Admin\GerenciarVagaController@detalhes')->name('admin.vaga.detalhes');
    Route::get('vaga/aceitar/{id}', 'Admin\GerenciarVagaController@aceitar')->name('admin.vaga.aceitar');
    Route::get('vaga/recusar/{id}', 'Admin\GerenciarVagaController@recusar')->name('admin.vaga.recusar');
    Route::get('vaga/edit/{id}', 'Admin\GerenciarVagaController@edit')->name('admin.vaga.edit');
    Route::post('vaga/update/', 'Admin\GerenciarVagaController@update')->name('admin.vaga.update');
    Route::get('vaga/delete/{id}', 'Admin\GerenciarVagaController@delete')->name('admin.vaga.delete');

    Route::get('blog/', 'Admin\BlogController@index')->name('admin.blog.index');
    Route::get('blog/posts/create', 'Admin\BlogController@create')->name('admin.blog.post.create');
    Route::post('blog/posts/store', 'Admin\BlogController@store')->name('admin.blog.post.store');
    Route::get('blog/posts/edit/{id}', 'Admin\BlogController@edit')->name('admin.blog.post.edit');
    Route::put('blog/posts/edit/update', 'Admin\BlogController@update')->name('admin.blog.post.update');
    Route::get('blog/posts/delete/{id}', 'Admin\BlogController@delete')->name('admin.blog.post.delete');

    Route::get('blog/categorias', 'Admin\CategoriaBlogController@index')->name('admin.blog.categoria.index');
    Route::post('blog/categorias', 'Admin\CategoriaBlogController@store')->name('admin.blog.categoria.store');
    Route::get('blog/categorias/edit/{id}', 'Admin\CategoriaBlogController@edit')->name('admin.blog.categoria.edit');
    Route::put('blog/categorias', 'Admin\CategoriaBlogController@update')->name('admin.blog.categoria.update');
    Route::get('blog/categorias/delete/{id}', 'Admin\CategoriaBlogController@delete')->name('admin.blog.categoria.delete');


    Route::get('config/profissao', 'Admin\ProfissaoController@index')->name('admin.config.profissao.index');
    Route::post('config/profissao/create', 'Admin\ProfissaoController@store')->name('admin.config.profissao.store');
    Route::post('config/profissao/update', 'Admin\ProfissaoController@update')->name('admin.config.profissao.update');
    Route::get('config/profissao/edit/{id}', 'Admin\ProfissaoController@edit')->name('admin.config.profissao.edit');
    Route::get('config/profissao/delete/{id}', 'Admin\ProfissaoController@delete')->name('admin.config.profissao.delete');
});

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






    // Route::get('vaga', 'Empresa\EmpresaVagaController@index')->name('empresa.vaga.index');
    // Route::post('vaga', 'Empresa\EmpresaVagaController@store')->name('empresa.vaga.store');

    // Route::get('vaga/getEstado/{id}', function ($id) {
    //     $municipios = Municipio::whereEstadoId($id)->get();
    //     return $municipios;
    // });

    // Route::get('vaga/emandamento', 'Empresa\EmpresaVagaController@EmAndamento')->name('empresa.vaga.emandamento');
    // Route::get('vaga/recusado', 'Empresa\EmpresaVagaController@Recusado')->name('empresa.vaga.recusado');
    // Route::get('vaga/vencido', 'Empresa\EmpresaVagaController@Vencido')->name('empresa.vaga.vencido');
    // Route::get('vaga/edit/{id}', 'Empresa\EmpresaVagaController@edit')->name('empresa.vaga.edit');
    // Route::post('vaga/update', 'Empresa\EmpresaVagaController@update')->name('empresa.vaga.update');
    // Route::get('vaga/delete/{id}', 'Empresa\EmpresaVagaController@delete')->name('empresa.vaga.delete');
});
