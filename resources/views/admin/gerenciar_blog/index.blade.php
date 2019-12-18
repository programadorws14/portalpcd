@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"></b>Postagens</b></div>
        
        <div class="card-body">
            <a href="{{ route('admin.blog.create') }}" class="btn btn-success btn-sm mb-4"><i class="fas fa-plus"></i> Novo Post</a>
            @if(Session('success'))
            <div class="alert alert-success">
                <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
            </div>
            @elseif(Session('error'))
            <div class="alert alert-danger">
                <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
            </div>
            @endif

            @include('admin.gerenciar_blog._list')

        </div>
    </div>
</div>
@endsection