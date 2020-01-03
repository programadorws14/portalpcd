@extends('layouts.app')
@section('content')

<header class="section-heading pcd-container">
    <h1>Home / Vaga <strong>{{ ' / '. $vaga->titulo ?? null }}</strong></h1>
    <hr />
</header>

<div class="wrapper container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-3 profile__info">
            @if(!empty($vaga->empresa->logo_empresa))
            <img src="{{ asset($vaga->empresa->logo_empresa) }}" width="160" height="160" alt="{{ $vaga->empresa->nome ?? null }}"  style="border-radius:100%;"/>
            @else
            <img src="{{ asset('site/assets/images/profile-image.png') }}" width="160" height="160" alt="{{ $vaga->empresa->nome ?? null }}" style="border-radius:100%;" />
            @endif
            <h2 class="profile__title">{{ $vaga->empresa->nome ?? null }}</h2>
            <p class="profile__username">{{ '/'. $vaga->empresa->nome_url ?? null }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <section class="profile">
                <div class="profile__card">
                    <section class="profile__section">
                        <h2>
                            Detalhes do trabalho <i class="fas fa-chevron-down"></i>
                        </h2>   
                        <ul>
                            <li>Vagas disponíveis: {{ $vaga->numero_vaga ?? null }}</li>
                            <li>Data de publicação: {{ date('d/m/Y H:i:s', strtotime($vaga->created_at)) ?? null }}</li>
                            <li>Local: {{ $vaga->cidade. ' | '. $vaga->estado ?? null }}</li>
                            <li>Tipo de emprego: {{ $vaga->tipo_emprego ?? null }}</li>
                            <li>Salário: {{ ( $vaga->salario_de ? ' R$ '. number_format($vaga->salario_de,2,",",".") : 'A Combinar' ) }}  {{ ( $vaga->salario_ate ? ' - R$ '.number_format($vaga->salario_ate,2,",",".") : 'A Combinar' ) }} </li>
                        </ul>
                    </section>
                </div>
            </section>
        </div>
        <div class="col-md-8 col-md-offset-1 col-xs-12">
            <section class="descricao-vaga negative">
                <div class="header-descicao-vaga">
                    <h2 class="title">Descição da vaga</h2>
                </div>
                <div class="content-descricao-vaga">
                    <div class="content">
                        <p>{{ $vaga->descricao_vaga ?? 'Descrição não informada pela empresa.' }}</p>
                    </div>
                    @if(Session('success'))
                    <div class="alert alert-success" style="margin:20px 0; color:green;">
                        <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
                    </div>
                    @elseif(Session('error'))
                    <div class="alert alert-danger" style="margin:20px 0; color:red;">
                        <b><i class="fas fa-times-circle"></i> {{ Session('error') }}</b>
                    </div>
                    @endif

                    @if(!Auth::guard('usuario')->user())
                        <div class="col-md-12" style="margin:40px 0;">
                            <a class="botao-link" style="background:#00b7dd !important; text-decoration:none; color:#FFF; font-size:16px !important; padding:10px;" href="{{ route('site.login.candidato') }}">Logar para Candidatar-se</a>
                        </div>
                        
                    @elseif(!empty($cadastrado_vaga))
                    <br />
                        <span style="background:#0086a5; margin-top:15px; color:#FFF; padding:5px; border-radius:10px;"><b>{{ Auth::guard('usuario')->user()->nome }}</b>, você já está cadastrado nessa vaga!</span>
                        <span style="display:block; margin-top:15px; "><b>Cadastro efetuado em:</b> {{ date('d/m/Y', strtotime($cadastrado_vaga->created_at)) }} </span>
                        <br/>
                    @else
                        <br/>
                        <div class="col-md-12" style="margin:40px 0;">
                            <a class="botao-link" style="text-decoration:none; color:#FFF; font-size:16px !important; padding:10px;" href="{{ route('usuario.candidatar.vaga', $vaga->id) }}">Candidatar-se</a>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>

<header class="section-heading  pcd-container">
    <h1>Confira <strong>MAIS VAGAS</strong></h1>
    <hr />
    <a href="#">Confira todas as Vagas</a>
</header>

<section class="jobs-card__container  pcd-container">
    <div class="row search-form__row">
        
        @foreach($vagas as $v)
            @if($v->id != $vaga->id)
            <div class="col-xs-12 col-md-4" style="margin-top:25px;">
                <article class="jobs-card">
                    <section class="jobs-card__header">
                        <div class="jobs-card__image">
        
                            @if(!empty($v->empresa->logo_empresa))
                            <img src="{{ asset($v->empresa->logo_empresa) }}" width="90" height="90" alt="{{ $v->empresa->nome ?? null }}" />
                            @else
                            <img src="{{ asset('img/img-empresa.png') }}" width="90" height="90" alt="{{ $v->empresa->nome ?? null }}" />
                            @endif
        
                        </div>
                        <div class="jobs-card__description">
                            <h2 class="jobs-card__title"><a href="{{ route('site.vagas.show', $v->id) }}">{{ substr($v->titulo, 0, 20) ?? null }}</a></h2>
                            <h4 class="jobs-card__subtitle">{{ substr($v->descricao_vaga, 0, 65) ?? null }}</h4>
                        </div>
                    </section>
                    <footer class="jobs-card__footer">
                        <p class="jobs-card__location">
                            <i class="fas fa-location-arrow"></i>&nbsp; {{ $v->cidade ?? null }} - {{ $v->estado ?? null }}
                        </p>
                        <p class="jobs-card__date">
                            <i class="fas fa-calendar"></i>&nbsp; Publicado em: {{ date('d/m/Y', strtotime($v->created_at)) ?? null }}
                        </p>
                    </footer>
                </article>
            </div>
            @endif
        @endforeach
    </div>

    {{-- <div class="row ">
        <div class="col-xs-12 hide show-md">
            <button class="jobs-card__see-more">Ver Mais</button>
        </div>
    </div> --}}

</section>

@endsection