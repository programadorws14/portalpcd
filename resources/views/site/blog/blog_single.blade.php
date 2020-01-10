@extends('layouts.app')
@section('content')

<header class="section-heading pcd-container">
    <h1>PCD / <strong>BLOG</strong></h1>
    <hr />
</header>

<div class="wrapper container-fluid">
    <div class="row">

        <div class="col-xs-12 col-md-5" style=" margin:0 auto; height:240px; background:url({{ ( $post->capa ? asset($post->capa) : asset('site/assets/images/profile-image.png') ) }}) center; background-size:100%; z-index:9999;">

        </div>

        <div class="col-md-8 col-xs-5" style="margin: -70px auto 0;">
            <section class="descricao-vaga negative page">
                <div class="content-descricao-vaga">
                    <div class="content" style="padding-top:70px;">

                        <small style="margin-bottom:20px; float:left; width:100%;    color:#CCC;">Data: {{ date('d/m/Y', strtotime($post->created_at)) }} | Categoria: {{ $post->categoria->descricao ?? 'Sem Categoria' }}</small>
                        <p>{!! $post->conteudo !!}</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection