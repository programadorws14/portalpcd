@extends('layouts.app')
@section('content')
<section class="search-form__container">
    <h1 class="search-form__title hide show-md">
        DIFÍCIL DE ENCONTRAR TRABALHO?
        <br />
        <strong>AQUI FICA MAIS PERTO DO SEU OBJETIVO</strong>
    </h1>
    <form action="{{ route('site.fitro.home') }}" method="POST" class="search-form">
        @csrf
        <!-- <input type="text" name="job-title" placeholder="Digite o Cargo ou Área Profissional" /> -->
        <select class="select2" name="vaga" placeholder="Vagas" place style="width:35%; height: auto !important;">
            <option>Selecione a vaga</option>
            @if (count($vagas) > 0)
                @foreach ($vagas as $vaga)
                    <option value="{{ $vaga->titulo }}">{{ $vaga->titulo }}</option>
                @endforeach
            @endif
        </select>
        <p class="search-form__helper-text">Exemplos: Gerente, UX, Telefonista</p>

        <div class="search-form__breaker"></div>

        <!-- <input type="text" name="job-title" placeholder="Digite o Cargo ou Área Profissional" /> -->
        <select class="select2" name="estado" placeholder="" style=" width:35%; height: auto !important;">
            <option>Selecione o estado</option>
            @if (count($estados) > 0)
                @foreach ($estados as $estado)
                    <option value="{{ $estado->estado }}">{{ $estado->estado }}</option>
                @endforeach
            @endif
        </select>
        <p class="search-form__helper-text">
            Exemplos: Ribeirão Preto, São Paulo, Rio de Janeiro
        </p>

        <div class="search-form__breaker"></div>

        <button type="submit" class="search-form__submit">Buscar Vagas</button>
    </form>
</section>

<header class="section-heading  pcd-container">
    <h1>Principais <strong>VAGAS</strong></h1>
    <hr />
    <a href="{{ route('site.vagas') }}">Confira todas as vagas</a>
</header>

<section class="jobs-card__container  pcd-container">
    <div class="row search-form__row">
        @if(count($vagas) <= 0) 
            <div class="alert alert-warning">
                <p>Ainda não temos vagas cadastradas!</p>
            </div>
        @else
            @foreach($vagas as $vaga)
                <div class="col-xs-12 col-md-4" style="margin-top:25px;">
                    <article class="jobs-card">
                        <section class="jobs-card__header">
                            <div class="jobs-card__image">

                                @if(!empty($vaga->empresa->logo_empresa))
                                <img src="{{ asset($vaga->empresa->logo_empresa) }}" width="90" height="90" alt="{{ $vaga->empresa->nome ?? null }}" />
                                @else
                                <img src="{{ asset('img/img-empresa.png') }}" width="90" height="90" alt="{{ $vaga->empresa->nome ?? null }}" />
                                @endif

                            </div>
                            <div class="jobs-card__description">
                                <h2 class="jobs-card__title"><a href="{{ route('site.vagas.show', $vaga->id) }}">{{ substr($vaga->titulo, 0, 20) ?? null }}</a></h2>
                                <h4 class="jobs-card__subtitle">{{ substr($vaga->descricao_vaga, 0, 65) ?? null }}</h4>
                            </div>
                        </section>
                        <footer class="jobs-card__footer">
                            <p class="jobs-card__location">
                                <i class="fas fa-location-arrow"></i>&nbsp; {{ $vaga->cidade ?? null }} - {{ $vaga->estado ?? null }}
                            </p>
                            <p class="jobs-card__date">
                                <i class="fas fa-calendar"></i>&nbsp; Publicado em: {{ date('d/m/Y', strtotime($vaga->created_at)) ?? null }}
                            </p>
                        </footer>
                    </article>
                </div>
            @endforeach
        @endif
        <div class="cards-vermais row"></div>

    </div>
    <div class="row ">
        <div class="col-xs-12 hide show-md">
            <button type="button" class="jobs-card__see-more">Ver Mais</button>
        </div>
    </div>
</section>

<section class="submit-cv-cta  pcd-container">
    <div class="submit-cv-cta__description">
        <h1>Cadastre Agora seu CV</h1>
        <h2>
            Cadastre o seu CV e candidate-se as vagas das melhores empresas do Brasil
        </h2>
    </div>
    <a href="#">Cadastre Aqui</a>
</section>

<header class="section-heading  pcd-container">
    <h1>As Últimas do <strong>BLOG</strong></h1>
    <hr />
    <a href="#">Confira todas as notícias</a>
</header>

<section class="blog-post__container  pcd-container">
    <div class="row blog-post__row">
        
        @if (count($posts) > 0)
            @foreach($posts as $post)
                <div class="col-xs-12 col-md-4">
                    <article class="blog-post">
                        <section class="blog-post__header">
                            <div class="blog-post__image">
                                <img src="{{ asset($post->capa) }}" style="border-radius:100%;" width="130" height="130" alt="Imagem" />
                            </div>
                            <div class="blog-post__description">
                            <div class="blog-post__date"><span>{{ date('d/m/Y', strtotime($post->created_at)) ?? null }}</span></div>
                                <a href="#" class="blog-post__category">{{ $post->categoria->descricao ?? null }}</a>

                                <h2 class="blog-post__title">{{ mb_strimwidth($post->titulo, 0, 38, "...") }}</h2>
                                <p class="blog-post__excerpt">
                                    {{ mb_strimwidth(strip_tags(trim($post->conteudo)), 0, 200, "...") }}
                                </p>

                                <a href="#" class="blog-post__read-more">Leia Mais...</a>
                            </div>
                        </section>
                        <footer class="blog-post__tags">
                            {{-- <ul>
                                <li><a href="#" class="blog-post__tag">dicas</a></li>
                                <li><a href="#" class="blog-post__tag">vagas</a></li>
                                <li><a href="#" class="blog-post__tag">entrevistas</a></li>
                            </ul> --}}
                        </footer>
                    </article>
                </div>
            @endforeach
        @endif

    </div>
</section>
@endsection
