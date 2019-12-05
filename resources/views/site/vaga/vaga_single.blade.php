@extends('layouts.app')
@section('content')

<header class="section-heading pcd-container">
    <h1>Home / Vaga <strong>{{ ' / '. $vaga->titulo ?? null }}</strong></h1>
    <hr />
</header>

<div class="wrapper container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-3 profile__info">
            <img src="{{ asset('site/assets/images/profile-image.png') }}" alt="" />
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
                            <li>Setor: Vendas, Marketing & Varejo</li>
                            <li>Tipo de emprego: {{ $vaga->tipo_emprego ?? null }}</li>
                            <li>Salário: @if(!empty($vaga->salario_de) && !empty($vaga->salario_ate)) {{ $vaga->salario_de . ' - '. $vaga->salario_ate }} @endif</li>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <p>Lorem ipsum dolor sit <a href="#">amet consectetur adipisicing</a> elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet.</li>
                            <li>Eius tempore repellendus dolores voluptas?</li>
                            <li>Officia saepe perferendis debitis cum!</li>
                            <li>Quisquam deserunt tempora ullam est!</li>
                            <li>A, sit neque! Exercitationem, natus.</li>
                        </ul>
                        <p><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit.</strong> Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis iure dolorem quis asperiores est soluta perferendis mollitia id ipsam rerum ullam iste at nisi reprehenderit, aperiam explicabo dicta facere?</p>
                    </div>
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
        <div class="col-xs-12 col-md-4">
            <article class="jobs-card">
                <section class="jobs-card__header">
                    <div class="jobs-card__image">
                        <img src="{{ asset('site/assets/images/placeholder-job.png') }}" alt="Nome da Empresa" />
                    </div>
                    <div class="jobs-card__description">
                        <a href="#" class="jobs-card__openings">10 vagas</a>
                        <div class="jobs-card__favorite">
                            Favoritar
                            <button class="jobs-card__star">
                                <i class="fas fa-star"></i>
                            </button>
                        </div>
                        <h2 class="jobs-card__title">Lorem ipsum sit amet.</h2>
                        <h4 class="jobs-card__subtitle">Lorem Ipsum sit dolor amet.</h4>
                    </div>
                </section>
                <footer class="jobs-card__footer">
                    <p class="jobs-card__location">
                        <i class="fas fa-location-arrow"></i>&nbsp;São Paulo
                    </p>
                    <p class="jobs-card__date">
                        <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                    </p>
                </footer>
            </article>
        </div>
        <div class="col-xs-12 col-md-4">
            <article class="jobs-card">
                <section class="jobs-card__header">
                    <div class="jobs-card__image">
                        <img src="{{ asset('site/assets/images/placeholder-job.png') }}" alt="Nome da Empresa" />
                    </div>
                    <div class="jobs-card__description">
                        <a href="#" class="jobs-card__openings">10 vagas</a>
                        <div class="jobs-card__favorite">
                            Favoritar
                            <button class="jobs-card__star">
                                <i class="fas fa-star"></i>
                            </button>
                        </div>
                        <h2 class="jobs-card__title">Lorem ipsum sit amet.</h2>
                        <h4 class="jobs-card__subtitle">Lorem Ipsum sit dolor amet.</h4>
                    </div>
                </section>
                <footer class="jobs-card__footer">
                    <p class="jobs-card__location">
                        <i class="fas fa-location-arrow"></i>&nbsp;São Paulo
                    </p>
                    <p class="jobs-card__date">
                        <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                    </p>
                </footer>
            </article>
        </div>
        <div class="col-xs-12 col-md-4">
            <article class="jobs-card">
                <section class="jobs-card__header">
                    <div class="jobs-card__image">
                        <img src="{{ asset('site/assets/images/placeholder-job.png') }}" alt="Nome da Empresa" />
                    </div>
                    <div class="jobs-card__description">
                        <a href="#" class="jobs-card__openings">10 vagas</a>
                        <div class="jobs-card__favorite">
                            Favoritar
                            <button class="jobs-card__star">
                                <i class="fas fa-star"></i>
                            </button>
                        </div>
                        <h2 class="jobs-card__title">Lorem ipsum sit amet.</h2>
                        <h4 class="jobs-card__subtitle">Lorem Ipsum sit dolor amet.</h4>
                    </div>
                </section>
                <footer class="jobs-card__footer">
                    <p class="jobs-card__location">
                        <i class="fas fa-location-arrow"></i>&nbsp;São Paulo
                    </p>
                    <p class="jobs-card__date">
                        <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                    </p>
                </footer>
            </article>
        </div>
    </div>
    <div class="row  search-form__row">
        <div class="col-xs-12 col-md-4">
            <article class="jobs-card">
                <section class="jobs-card__header">
                    <div class="jobs-card__image">
                        <img src="{{ asset('site/assets/images/placeholder-job.png') }}" alt="Nome da Empresa" />
                    </div>
                    <div class="jobs-card__description">
                        <a href="#" class="jobs-card__openings">10 vagas</a>
                        <div class="jobs-card__favorite">
                            Favoritar
                            <button class="jobs-card__star">
                                <i class="fas fa-star"></i>
                            </button>
                        </div>
                        <h2 class="jobs-card__title">Lorem ipsum sit amet.</h2>
                        <h4 class="jobs-card__subtitle">Lorem Ipsum sit dolor amet.</h4>
                    </div>
                </section>
                <footer class="jobs-card__footer">
                    <p class="jobs-card__location">
                        <i class="fas fa-location-arrow"></i>&nbsp;São Paulo
                    </p>
                    <p class="jobs-card__date">
                        <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                    </p>
                </footer>
            </article>
        </div>
        <div class="col-xs-12 col-md-4">
            <article class="jobs-card">
                <section class="jobs-card__header">
                    <div class="jobs-card__image">
                        <img src="{{ asset('site/assets/images/placeholder-job.png') }}" alt="Nome da Empresa" />
                    </div>
                    <div class="jobs-card__description">
                        <a href="#" class="jobs-card__openings">10 vagas</a>
                        <div class="jobs-card__favorite">
                            Favoritar
                            <button class="jobs-card__star">
                                <i class="fas fa-star"></i>
                            </button>
                        </div>
                        <h2 class="jobs-card__title">Lorem ipsum sit amet.</h2>
                        <h4 class="jobs-card__subtitle">Lorem Ipsum sit dolor amet.</h4>
                    </div>
                </section>
                <footer class="jobs-card__footer">
                    <p class="jobs-card__location">
                        <i class="fas fa-location-arrow"></i>&nbsp;São Paulo
                    </p>
                    <p class="jobs-card__date">
                        <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                    </p>
                </footer>
            </article>
        </div>
        <div class="col-xs-12 col-md-4">
            <article class="jobs-card">
                <section class="jobs-card__header">
                    <div class="jobs-card__image">
                        <img src="{{ asset('site/assets/images/placeholder-job.png') }}" alt="Nome da Empresa" />
                    </div>
                    <div class="jobs-card__description">
                        <a href="#" class="jobs-card__openings">10 vagas</a>
                        <div class="jobs-card__favorite">
                            Favoritar
                            <button class="jobs-card__star">
                                <i class="fas fa-star"></i>
                            </button>
                        </div>
                        <h2 class="jobs-card__title">Lorem ipsum sit amet.</h2>
                        <h4 class="jobs-card__subtitle">Lorem Ipsum sit dolor amet.</h4>
                    </div>
                </section>
                <footer class="jobs-card__footer">
                    <p class="jobs-card__location">
                        <i class="fas fa-location-arrow"></i>&nbsp;São Paulo
                    </p>
                    <p class="jobs-card__date">
                        <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                    </p>
                </footer>
            </article>
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-12 hide show-md">
            <button class="jobs-card__see-more">Ver Mais</button>
        </div>
    </div>
</section>

@endsection