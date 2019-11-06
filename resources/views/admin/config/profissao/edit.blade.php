@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session('success'))
            <div class="alert alert-success">
                <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
            </div>
            @elseif(Session('error'))
            <div class="alert alert-danger">
                <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
            </div>
            @endif
            <form action="{{ route('admin.config.profissao.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $edit->id ?? null }}">
                <div class="card">
                    <div class="card-header">Edit: <b>{{ $edit->descricao ?? null }}</b></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Descrição</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ (old('descricao') ? old('descricao') : $edit->descricao ) }}" name="descricao">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Status</div>
                                    </div>
                                    <select class="form-control" name="status">
                                        <option value="">Selectione o status</option>
                                        <option @if($edit->status == 1) selected @endif value="1">Ativo</option>
                                        <option @if($edit->status == 2) selected @endif value="2">Inativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</button>
                        <a href="{{ route('admin.config.profissao.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.config.profissao.list')

@endsection