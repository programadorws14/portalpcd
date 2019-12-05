@extends('layouts.app')
@section('content')
<section class="search-form__container">
    <h1 class="search-form__title hide show-md">
        DIFÍCIL DE ENCONTRAR TRABALHO?
        <br />
        <strong>AQUI FICA MAIS PERTO DO SEU OBJETIVO</strong>
    </h1>
    <form action="#" class="search-form">
        <!-- <input type="text" name="job-title" placeholder="Digite o Cargo ou Área Profissional" /> -->
        <select class="select2" name="" placeholder="Vagas" place style=" height: auto !important;">
            <option>Selecione</option>
        </select>
        <p class="search-form__helper-text">Exemplos: Gerente, UX, Telefonista</p>

        <div class="search-form__breaker"></div>

        <!-- <input type="text" name="job-title" placeholder="Digite o Cargo ou Área Profissional" /> -->
        <select class="select2" name="" placeholder="Cidades" style=" height: auto !important;">
            <option>Selecione</option>
        </select>
        <p class="search-form__helper-text">
            Exemplos: Ribeirão Preto, São Paulo, Rio de Janeiro
        </p>

        <div class="search-form__breaker"></div>



        <div class="search-form__breaker"></div>
        <button class="search-form__submit">Buscar Vagas</button>
    </form>
</section>

<header class="section-heading  pcd-container">
    <h1>Principais <strong>VAGAS</strong></h1>
    <hr />
    <a href="#">Confira todas as Vagas</a>
</header>

<section class="jobs-card__container  pcd-container">
    <div class="row search-form__row">

        @if(count($vagas) <= 0) <div class="alert alert-warning">
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
    </div>

    <div class="row ">
        <div class="col-xs-12 hide show-md">
            <button class="jobs-card__see-more">Ver Mais</button>
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
        <div class="col-xs-12 col-md-4">
            <article class="blog-post">
                <section class="blog-post__header">
                    <div class="blog-post__image">
                        <img src="{{ asset('site/assets/images/Bitmap.png') }}" alt="Imagem" />
                    </div>
                    <div class="blog-post__description">
                        <div class="blog-post__date"><span>26 de Maio, 2019</span></div>
                        <a href="#" class="blog-post__category">/categoria</a>

                        <h2 class="blog-post__title">Lorem Ipsum sit dolor amet</h2>
                        <p class="blog-post__excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                            auctor consectetur ante, quis aliquam erat pellentesque ut.
                            Pellentesque placerat porttitor lacinia.
                        </p>

                        <a href="#" class="blog-post__read-more">Leia Mais...</a>
                    </div>
                </section>
                <footer class="blog-post__tags">
                    <ul>
                        <li><a href="#" class="blog-post__tag">dicas</a></li>
                        <li><a href="#" class="blog-post__tag">vagas</a></li>
                        <li><a href="#" class="blog-post__tag">entrevistas</a></li>
                    </ul>
                </footer>
            </article>
        </div>
        <div class="col-xs-12 col-md-4">
            <article class="blog-post">
                <section class="blog-post__header">
                    <div class="blog-post__image">
                        <img src="{{ asset('site/assets/images/Bitmap.png') }}" alt="Imagem" />
                    </div>
                    <div class="blog-post__description">
                        <div class="blog-post__date"><span>26 de Maio, 2019</span></div>
                        <a href="#" class="blog-post__category">/categoria</a>

                        <h2 class="blog-post__title">Lorem Ipsum sit dolor amet</h2>
                        <p class="blog-post__excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                            auctor consectetur ante, quis aliquam erat pellentesque ut.
                            Pellentesque placerat porttitor lacinia.
                        </p>

                        <a href="#" class="blog-post__read-more">Leia Mais...</a>
                    </div>
                </section>
                <footer class="blog-post__tags">
                    <ul>
                        <li><a href="#" class="blog-post__tag">dicas</a></li>
                        <li><a href="#" class="blog-post__tag">vagas</a></li>
                        <li><a href="#" class="blog-post__tag">entrevistas</a></li>
                    </ul>
                </footer>
            </article>
        </div>
        <div class="col-xs-12 col-md-4">
            <article class="blog-post">
                <section class="blog-post__header">
                    <div class="blog-post__image">
                        <img src="{{ asset('site/assets/images/Bitmap.png') }}" alt="Imagem" />
                    </div>
                    <div class="blog-post__description">
                        <div class="blog-post__date"><span>26 de Maio, 2019</span></div>
                        <a href="#" class="blog-post__category">/categoria</a>

                        <h2 class="blog-post__title">Lorem Ipsum sit dolor amet</h2>
                        <p class="blog-post__excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                            auctor consectetur ante, quis aliquam erat pellentesque ut.
                            Pellentesque placerat porttitor lacinia.
                        </p>

                        <a href="#" class="blog-post__read-more">Leia Mais...</a>
                    </div>
                </section>
                <footer class="blog-post__tags">
                    <ul>
                        <li><a href="#" class="blog-post__tag">dicas</a></li>
                        <li><a href="#" class="blog-post__tag">vagas</a></li>
                        <li><a href="#" class="blog-post__tag">entrevistas</a></li>
                    </ul>
                </footer>
            </article>
        </div>
    </div>
</section>
@endsection