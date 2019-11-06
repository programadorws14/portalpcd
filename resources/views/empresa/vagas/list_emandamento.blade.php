@extends('empresa.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Em Andamento</div>
                <div class="card-body">
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
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Por</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Salário</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Status</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Municipio</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Endereço</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Titulo</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Qtd Vagas</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Aprovação</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data Abertura</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data Vencimento</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($vagas as $vaga)
                                <tr>
                                    <td>{{ Auth::user()->nome ?? null }}</td>
                                    <td>{{ ( $vaga->salario ? 'R$ '. number_format( $vaga->salario, 2, ',', '.') : 'A Combinar') }}</td>
                                    <td>
                                        @if($vaga->status == 1)
                                        Ativo
                                        @else
                                        Inativo
                                        @endif
                                    </td>
                                    <td>{{ $vaga->estado[0]->nome ?? null }}</td>
                                    <td>{{ $vaga->municipio[0]->nome ?? null }}</td>
                                    <td>{{ $vaga->endereco ?? null }}</td>
                                    <td>{{ $vaga->titulo ?? null }}</td>
                                    <td>{{ $vaga->qtd_vagas ?? null }}</td>
                                    <td>
                                        @if($vaga->aprovacao_user_id == null)
                                        <span class="badge badge-warning">Aguardando Aprovação</span>
                                        @elseif($vaga->status == 1 && $vaga->aprovacao_user_id != null)
                                        <span class="badge badge-success">Aprovado</span>
                                        @elseif($vaga->status == 3 && $vaga->aprovacao_user_id != null)
                                        <span class="badge badge-danger">Recusado</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($vaga->data_abertura)) ?? null }}</td>
                                    <td>{{ date('d/m/Y', strtotime($vaga->data_vencimento)) ?? null }}</td>
                                    <td>
                                        @if($vaga->status == 1 && $vaga->aprovacao_user_id != null)
                                        <small>N/ Permitido Alteração</small>
                                        @else
                                        <a href="{{ route('empresa.vaga.edit', $vaga->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('empresa.vaga.delete', $vaga->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        @endif
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