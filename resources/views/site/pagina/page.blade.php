@extends('layouts.app')
@section('content')

<header class="section-heading pcd-container">
    <h1>PCD / <strong>{{ $page->titulo }}</strong></h1>
    <hr />
</header>

<div class="wrapper container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <section class="descricao-vaga negative page">
                <div class="content-descricao-vaga">
                    <div class="content">
                        <small style="margin-bottom:20px; float:left; width:100%;    color:#CCC;">Data: {{ date('d/m/Y', strtotime($page->created_at)) }}</small>
                        <p>{!! $page->conteudo !!}</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection