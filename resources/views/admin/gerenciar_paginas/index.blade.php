@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Páginas</div>
                <div class="card-body">
                    <a href="{{ route('admin.paginas.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Nova</a>
                    @if(Session('success'))
                    <div class="alert alert-success">
                        <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
                    </div>
                    @elseif(Session('error'))
                    <div class="alert alert-danger">
                        <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
                    </div>
                    @endif

                    @include('admin.gerenciar_paginas._list')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection