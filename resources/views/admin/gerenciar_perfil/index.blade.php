@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alterar Senha</div>
                <form action="{{ route('admin.update') }}" method="POST">
                    @csrf
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

                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Senha Atual</div>
                                    </div>
                                    <input type="password" class="form-control" value="" name="senhaAtual">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nova Senha</div>
                                    </div>
                                    <input type="password" class="form-control" value="" name="novaSenha">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Repetir Nova Senha</div>
                                    </div>
                                    <input type="password" class="form-control" value="" name="repetirNovaSenha">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection