@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Analise: <b>{{ $vaga->titulo ?? null }}</b></div>
                <div class="card-body">
                    <div class="row">
                        @if(Session('success'))
                        <div class="col-md-12 mb-3">
                            <div class="alert alert-success">
                                <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
                            </div>
                            @elseif(Session('error'))
                            <div class="alert alert-danger">
                                <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12 mb-3">
                            @if(!empty($vaga->user[0]->logo))
                            <img style="border:1px solid #ccc;" src="{{ asset($vaga->user[0]->logo)}}" width="120" height="120 " class="img-fluid" alt="{{ $vaga->user[0]->nome }}" title="{{  $vaga->user[0]->nome }}">
                            @else
                            <img style="border:1px solid #ccc;" src="{{ asset('img/img-empresa.png')}}" width="120" height="120" class="img-fluid" alt="{{  $vaga->user[0]->nome }}" title="{{  $vaga->user[0]->nome }}">
                            @endif
                        </div>

                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Empresa</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->user[0]->nome ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Data Abertura</div>
                                </div>
                                <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($vaga->data_abertura)) ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Titulo</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->titulo ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Descrição</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->descricao ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Estado</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->estado[0]->nome ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Municipio</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->municipio[0]->nome ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">CEP</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->cep ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Endereço</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->endereco ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Benefícios</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->beneficios ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Salário</div>
                                </div>
                                <input type="text" class="form-control" value="{{ ($vaga->salario ?  number_format($vaga->salario, 2, ',', '.' ) : 'A Combinar') }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Qtd Vagas</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->qtd_vagas ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Horário</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->horario ?? null }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Informações Adicionais</div>
                                </div>
                                <input type="text" class="form-control" value="{{ $vaga->info_adicionais ?? null }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if($vaga->aprovacao_user_id != null && $vaga->status == 1)
                    <span class="badge badge-success">APROVADO</span>
                    @elseif($vaga->aprovacao_user_id != null && $vaga->status == 3)
                    <span class="badge badge-danger">RECUSADA</span>
                    @else
                    <a href="{{ route('admin.vaga.aceitar', $vaga->id) }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Aprovar</a>
                    <a href="{{ route('admin.vaga.recusar', $vaga->id) }}" onClick="return confirm('Deseja mesmo Recusar ?')" class="btn btn-danger btn-sm"><i class="fas fa-times-circle "></i> Recusar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection