@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mb-5">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-4" >
            <a href="{{ route('admin.dashboard') }}" style="text-decoration:none;">
                <div class="card text-white mb-3" style="background:#c98620;">
                    <div class="card-header"><b>ADMIN</b></div>
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-cogs"></i> {{ count($countAdmin) ?? 'N/I' }}</h1>
                        <p class="card-text">Cadastradas</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xs-12 col-md-4" >
            <a href="{{ route('admin.newsletter') }}" style="text-decoration:none;">
                <div class="card text-white mb-3" style="background:#96056d">
                    <div class="card-header"><b>NEWSLETTER</b></div>
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-envelope"></i> {{ count($countNews) ?? 'N/I' }}</h1>
                        <p class="card-text">Cadastradas</p>
                    </div>
                </div>
            </a>
        </div>

         <div class="col-xs-12 col-md-4"  >
            <a href="{{ route('admin.gerenciar.empresas') }}" style="text-decoration:none;">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header"><b>EMPRESAS</b></div>
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-building"></i> {{ count($countEmp) ?? 'N/I' }}</h1>
                        <p class="card-text">Cadastradas</p>
                    </div>
                </div>
            </a>
        </div>

         <div class="col-xs-12 col-md-4" >
            <a href="{{ route('admin.gerenciar.usuarios') }}" style="text-decoration:none;">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header"><b>CANDIDATOS</b></div>
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-users"></i> {{ count($countUsu) ?? 'N/I' }}</h1>
                        <p class="card-text">Cadasrtrados</p>
                    </div>
                </div>
            </a>
        </div>

         <div class="col-xs-12 col-md-4" >
            <a href="{{ route('admin.gerenciar.vagas') }}" style="text-decoration:none;">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header"><b>VAGAS</b></div>
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-briefcase"></i> {{ count($countVag) ?? 'N/I' }}</h1>
                        <p class="card-text">Cadastradas</p>
                    </div>
                </div>
            </a>
        </div>

         <div class="col-xs-12 col-md-4" >
            <a href="{{ route('admin.blog') }}" style="text-decoration:none;">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header"><b>POSTS</b></div>
                    <div class="card-body">
                        <h1 class="card-title"><i class="fas fa-blog"></i> {{ count($countPos) ?? 'N/I' }}</h1>
                        <p class="card-text">Cadastrados</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid mb-5">
    <div class="row">

        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header">Últimos Vagas</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Empresa</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Vaga</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Candidaturas</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($vagas) > 0)
                                    @foreach ($vagas as $vaga)
                                        <tr>
                                            <td class="align-middle p-2">{{ $vaga->empresa->nome ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $vaga->titulo ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ count($vaga->candidaturas) ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $vaga->estado ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">
                                                <a href="{{ route('admin.gerenciar.vaga.edit', $vaga->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="#" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#vaga-{{ $vaga->id }}"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>

                                        <!---MODAL VISUALIZAÇÃO RÁPIDA DA VAGA--->
                                        <div class="modal fade" id="vaga-{{ $vaga->id }}" tabindex="-1" role="dialog" aria-labelledby="vaga-{{ $vaga->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:bold; font-size:17px; text-transform:uppercase;" id="vaga-{{ $vaga->id }}"><i class="fas fa-eye"></i> {{  $vaga->titulo ?? null}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Veja as informações rápidas do usuário:</p>
                                                    <span><i class="fas fa-quote-right"></i> Titulo: <b>{{ $vaga->titulo ?? null }}</b></span><hr />
                                                    <span><i class="fas fa-align-justify"></i> Descrição: <b>{{ $vaga->descricao_vaga ?? null }}</b></span><hr />
                                                    <span><i class="fas fa-globe-europe"></i> Localizacão: <b>{{ $vaga->cidade ?? null }} - {{ $vaga->estado ?? null }}</b></span><hr />
                                                    <span><i class="fas fa-calendar"></i> Data Nascimento: <b>{{ ( $vaga->created_at ? date('d/m/Y', strtotime($vaga->created_at)) : 'N/I' ) }}</b> </span>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header">Últimos Candidatos</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data Cadastro</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Localização</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($usuarios) > 0)
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td class="align-middle p-2">
                                                @if(!empty($usuario->foto))
                                                <img src="{{ asset($usuario->foto) }}" width="50" height="50" style="border-radius:100%; cursor:pointer;" alt="" data-toggle="modal" data-target="#usuario-{{ $usuario->id }}" />
                                                @else
                                                <img src="{{ asset('site/assets/images/profile-image.png') }}" style="cursor:pointer;" width="50" height="50" alt="" data-toggle="modal" data-target="#usuario-{{ $usuario->id }}" />
                                                @endif
                                            </td>
                                            <td class="align-middle p-2">{{ $usuario->nome ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ ( $usuario->created_at ? date('d/m/Y', strtotime($usuario->created_at)) : 'N/I' ) }}</td>
                                            <td class="align-middle p-2">{{ $usuario->cidade ?? 'N/I' }} - {{ $usuario->estado ?? 'N/I' }}</td>
                                            <td class="align-middle p-2" style="width:15%;">
                                                <a href="{{ route('admin.gerenciar.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.gerenciar.deletar', $usuario->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#usuario-{{ $usuario->id }}"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>

                                        <!---MODAL VISUALIZAÇÃO RÁPIDA DO CANDIDATO--->
                                        <div class="modal fade" id="usuario-{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="usuario-{{ $usuario->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:bold; font-size:17px; text-transform:uppercase;" id="usuario-{{ $usuario->id }}"><i class="fas fa-eye"></i> {{  $usuario->nome ?? null}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Veja as informações rápidas do usuário:</p>
                                                    <span><i class="fas fa-user"></i> Nome: <b>{{ $usuario->nome ?? null }}</b> </span>
                                                    <hr />
                                                    <span><i class="fas fa-calendar"></i> Data Nascimento: <b>{{ ( $usuario->data_nascimento ? date('d/m/Y', strtotime($usuario->data_nascimento)) : 'N/I' ) }}</b> </span><hr />
                                                    <span><i class="fas fa-info-circle"></i> Sobre o Candidato: <b>{{ $usuario->texto_sobre_voce ?? null }}</b> </span><hr />
                                                    <span><i class="fas fa-globe-americas"></i> Localização: <b>{{ $usuario->cidade ?? 'N/I' }} - {{ $usuario->estado ?? 'N/I' }}</b> </span><hr />
                                                    <span><i class="fas fa-thermometer-half"></i> Status Laudo <b>Ótimo</b> </span><hr />
                                                    <button class="btn btn-info btn-sm" style="color:#333 !important; font-weight:bold;"><i class="fas fa-file-pdf"></i> Download Curriculum</button>
                                                    <br />
                                                    <br />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <h5 class="card-header">Últimos Empresas</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Localizção</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($empresas) > 0)
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td class="align-middle p-2">
                                                @if(!empty($empresa->logo_empresa))
                                                <img src="{{ asset($empresa->logo_empresa) }}" width="50" height="50" style="border-radius:100%; cursor:pointer;" data-toggle="modal" data-target="#empresa-{{ $empresa->id }}" alt="" />
                                                @else
                                                <img src="{{ asset('site/assets/images/profile-image.png') }}" width="50" height="50" alt="" style="cursor:pointer;" data-toggle="modal" data-target="#empresa-{{ $empresa->id }}" />
                                                @endif
                                            </td>
                                            <td class="align-middle p-2">{{ $empresa->nome ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $empresa->cidade ?? 'N/I' }} - {{ $empresa->estado ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">
                                                <a href="{{ route('admin.gerenciar.empresa.edit', $empresa->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#empresa-{{ $empresa->id }}"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>

                                        <!---MODAL VISUALIZAÇÃO RÁPIDA DA Empresa--->
                                        <div class="modal fade" id="empresa-{{ $empresa->id }}" tabindex="-1" role="dialog" aria-labelledby="empresa-{{ $empresa->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="font-weight:bold; font-size:17px; text-transform:uppercase;" id="empresa-{{ $empresa->id }}"><i class="fas fa-eye"></i> {{  $empresa->nome ?? null}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Veja as informações rápidas da empresa:</p>
                                                        <span><i class="fas fa-user"></i> Nome: <b>{{ $empresa->nome ?? null }}</b></span><hr />
                                                        <span><i class="fas fa-user-tag"></i> Especialidades: <b>{{ $empresa->especialidades ?? null }}</b></span><hr />
                                                        <span><i class="fas fa-sitemap"></i> Site: <b>{{ $empresa->site_empresa ?? null }}</b></span><hr />
                                                        <span><i class="fas fa-envelope"></i> E-mail: <b>{{ $empresa->email ?? null }}</b></span><hr />
                                                        <span><i class="fas fa-phone-square-alt"></i> Telefone: <b>{{ $empresa->telefone ?? null }}</b></span><hr />
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</div>




@endsection