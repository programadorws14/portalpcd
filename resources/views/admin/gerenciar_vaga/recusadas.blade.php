@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Vagas Recusadas</div>
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
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Dt. Soli.</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="20%">Titulo</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Descrição</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="4%">Qtd Vagas</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="8%">Empresa</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="8%">Endereço</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Municipio</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($vagas as $vaga)
                                <tr>
                                    <td class="align-middle">{{ date('d/m/Y', strtotime($vaga->created_at)) ?? null }}</td>
                                    <td class="align-middle">{{ $vaga->titulo ?? null }}</td>
                                    <td class="align-middle">{{ $vaga->descricao ?? null }}</td>
                                    <td class="align-middle">{{ $vaga->qtd_vagas ?? null }}</td>
                                    <td class="align-middle">{{ $vaga->user[0]->nome ?? null }}</td>
                                    <td class="align-middle">{{ $vaga->endereco?? null }}</td>
                                    <td class="align-middle">{{ $vaga->estado[0]->nome ?? null }}</td>
                                    <td class="align-middle">{{ $vaga->municipio[0]->nome ?? null }}</td>

                                    <td class="align-middle">
                                        <span class="badge badge-danger">RECUSADA</span>
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