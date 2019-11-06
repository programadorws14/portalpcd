@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form>
                <div class="card">
                    <div class="card-header">Detalhes: <b>{{ $edit->nome ?? null }}</b> </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                @if(!empty($edit->logo))
                                <img style="border:1px solid #ccc;" src="{{ asset($edit->logo)}}" width="120" height="120 " class="img-fluid" alt="{{ $edit->nome }}" title="{{ $edit->nome }}">
                                @else
                                <img style="border:1px solid #ccc;" src="{{ asset('img/img-empresa.png')}}" width="120" height="120" class="img-fluid" alt="{{ $edit->nome }}" title="{{ $edit->nome }}">
                                @endif
                            </div>

                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">E-mail</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->nome ?? null }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Descrição</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->descricao ?? null }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Ramo</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->ramo ?? null }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Qtd Funcionários</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->qtd_funcionarios ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data Fundação</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($edit->data_fundacao)) ?? null }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Especialidades</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->especialidades ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Organização</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->organizacao ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Links</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->links ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Telefone</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->telefone ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Especialidades</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->especialidades ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Endereço</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->endereco ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Estado</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->estado[0]->nome ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Municipio</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $municipio->nome ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Site</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->site ?? null}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Especialidades</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->especialidades ?? null}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.empresa.aprovar', $edit->id) }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Aprovar</a>
                        <a href="{{ route('admin.empresa.recusar', $edit->id) }}" onClick="return confirm('Deseja mesmo Recusar ?')" class="btn btn-danger btn-sm"><i class="fas fa-minus"></i> Recusar</a>
                        <a href="{{ route('admin.empresa.pendente') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection