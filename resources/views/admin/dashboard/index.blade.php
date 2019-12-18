@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mb-5">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header"><b>EMPRESAS</b></div>
                <div class="card-body">
                    <h1 class="card-title"><i class="fas fa-building"></i> {{ count($countEmp) ?? 'N/I' }}</h1>
                    <p class="card-text">Cadastradas</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header"><b>USUÁRIOS</b></div>
                <div class="card-body">
                    <h1 class="card-title"><i class="fas fa-users"></i> {{ count($countUsu) ?? 'N/I' }}</h1>
                    <p class="card-text">Cadastradas</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"><b>VAGAS</b></div>
                <div class="card-body">
                    <h1 class="card-title"><i class="fas fa-briefcase"></i> {{ count($countVag) ?? 'N/I' }}</h1>
                    <p class="card-text">Cadastradas</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><b>POSTS</b></div>
                <div class="card-body">
                    <h1 class="card-title"><i class="fas fa-blog"></i> {{ count($countPos) ?? 'N/I' }}</h1>
                    <p class="card-text">Cadastrados</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-6 mb-5">
            <div class="card">
                <h5 class="card-header">Últimos Usuários</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Rua</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Cidade</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($usuarios) > 0)
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td class="align-middle p-2">
                                                @if(!empty($usuario->foto))
                                                <img src="{{ asset($usuario->foto) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                                                @else
                                                <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                                                @endif
                                            </td>
                                            <td class="align-middle p-2">{{ $usuario->nome ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $usuario->rua ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $usuario->cidade ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $usuario->estado ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">
                                                <a href="{{ route('admin.gerenciar.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.gerenciar.deletar', $usuario->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-5">
            <div class="card">
                <h5 class="card-header">Últimos Empresas</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Rua</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Cidade</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($empresas) > 0)
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td class="align-middle p-2">
                                                @if(!empty($empresa->logo_empresa))
                                                <img src="{{ asset($empresa->logo_empresa) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                                                @else
                                                <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                                                @endif
                                            </td>
                                            <td class="align-middle p-2">{{ $empresa->nome ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $empresa->rua ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $empresa->cidade ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $empresa->estado ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">
                                                <a href="{{ route('admin.gerenciar.empresa.edit', $empresa->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-5">
            <div class="card">
                <h5 class="card-header">Últimos Vagas</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
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
                                            <td class="align-middle p-2">
                                                @if(!empty($vaga->empresa->logo_empresa))
                                                <img src="{{ asset($vaga->empresa->logo_empresa) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                                                @else
                                                <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                                                @endif
                                            </td>
                                            <td class="align-middle p-2">{{ $vaga->empresa->nome ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $vaga->titulo ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ count($vaga->candidaturas) ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $vaga->estado ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">
                                                <a href="{{ route('admin.gerenciar.vaga.edit', $vaga->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="#" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-5">
            <div class="card">
                <h5 class="card-header">Últimos Posts Blog</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-bordered  table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Titulo</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Categoria</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($posts) > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="align-middle p-2">
                                                @if(!empty($post->capa))
                                                <img src="{{ asset($post->capa) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                                                @else
                                                <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                                                @endif
                                            </td>
                                            <td class="align-middle p-2">{{ $post->titulo ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ $post->categoria->descricao ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">{{ date('d/m/Y', strtotime($post->created_at)) ?? 'N/I' }}</td>
                                            <td class="align-middle p-2">
                                                <a href="{{ route('admin.blog.categoria.edit', $vaga->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.blog.categoria.delete', $vaga->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
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