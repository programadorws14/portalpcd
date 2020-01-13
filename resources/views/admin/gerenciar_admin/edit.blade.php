@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.gerenciar.admin.update') }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Editar Usuário</div>
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

                        @include('admin.gerenciar_admin._form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="bntSubmit" class="btn btn-info"><i class="fas fa-edit"></i> Editar</button>
                        <a href="{{ route('admin.gerenciar.admin') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Cancelar</a>
                    </div>
               
                </div>
            </div>
        </form>
    </div>
@endsection
