@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">Nova Categoria</div>
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
        <form action="{{ route('admin.blog.categoria.store') }}" method="POST">
            <div class="card-body">
                <div class="row">
                    @include('admin.blog.categoria._form')
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Cadastrar</button>
            </div>
        </form>
    </div>
</div>

@include('admin.blog.categoria._list')

@endsection