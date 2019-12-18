@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">Edit <b>{{ $edit->descricao }}</b></div>
        <div class="col-md-12 mt-3">
            @if(Session('success'))
            <div class="alert alert-success">
                <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
            </div>
            @elseif(Session('error'))
            <div class="alert alert-danger">
                <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
            </div>
            @endif
        </div>
        <form action="{{ route('admin.blog.categoria.update') }}" method="POST">
            {{ method_field('PUT') }}
            <div class="card-body">
                <div class="row">
                    @include('admin.gerenciar_blog.categoria._form')
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</button>
                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Cancelar</a>
            </div>
        </form>
    </div>
</div>
@include('admin.gerenciar_blog.categoria._list')
@endsection