@extends('empresa.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Vagas Vencidas</div>
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
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data</th>
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
                                        @elseif($vaga->status == 4)
                                        Vencido
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
                                        @elseif($vaga->status == 4 && $vaga->aprovacao_user_id != null)
                                        <span class="badge badge-primary">Vencido</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y h:i:s', strtotime($vaga->updated_at)) ?? null }}</td>
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