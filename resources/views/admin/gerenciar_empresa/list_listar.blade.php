@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Empresas</div>
                <div class="card-body">
                    <a href="#" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Nova</a>
                    @if(Session('success'))
                    <div class="alert alert-success">
                        <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
                    </div>
                    @elseif(Session('error'))
                    <div class="alert alert-danger">
                        <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="6%">Logo</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Ramo</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Qtd Funcionários</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Data Fund.</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="8%">Organização</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="8%">Status</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($empresas as $empresa)
                                <tr>
                                    <td class="align-middle">@if(!empty($empresa->logo))
                                        <img style="border:1px solid #ccc;" src="{{ asset($empresa->logo)}}" width="60" height="60" class="img-fluid" alt="{{ $empresa->nome }}" title="{{ $empresa->nome }}">
                                        @else
                                        <img style="border:1px solid #ccc;" src="{{ asset('img/img-empresa.png')}}" width="60" height="60" class="img-fluid" alt="{{ $empresa->nome }}" title="{{ $empresa->nome }}">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $empresa->nome ?? null }}</td>
                                    <td class="align-middle">{{ $empresa->ramo ?? null }}</td>
                                    <td class="align-middle">{{ $empresa->qtd_funcionarios ?? null }}</td>
                                    <td class="align-middle">{{ date('d/m/Y', strtotime($empresa->data_fundacao)) ?? null }}</td>
                                    <td class="align-middle">{{ $empresa->organizacao ?? null }}</td>
                                    <td class="align-middle">
                                        @if($empresa->status == 1)
                                        <span class="badge badge-success">ATIVO</span>
                                        @elseif($empresa->status == 2)
                                        <span class="badge badge-danger">INATIVO</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('admin.empresa.edit', $empresa->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.empresa.delete', $empresa->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-envelope"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection