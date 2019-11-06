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
            <form action="{{ route('admin.blog.post.store') }}" method="POSt" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Novo Post</div>
                    <div class="card-body">
                        <div class="row">
                            @include('admin.blog.posts._form')
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-globe"></i> Publicar</button>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection