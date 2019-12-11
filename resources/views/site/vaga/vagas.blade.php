@extends('layouts.app')
@section('content')
<div class="wrapper container-fluid">
        <header class="section-heading">
          <h1>Encontre <strong>Sua Vaga</strong></h1>
          <hr />
        </header>
  
        <div class="hide show-md">
          <nav class="openings-filter ">
            <h1>Refine sua busca</h1>
            <div class="search-input">
              <input type="text" placeholder="Buscar vagas..." />
              <i class="fas fa-search"></i>
            </div>
            <p>Adicionadas recentemente <i class="fas fa-chevron-down"></i></p>
          </nav>
        </div>
        <div class="row">
          <div class="col-xs-12 col-md-3">
            <section class="search-filter">
              <h2 class="search-filter__title">Selecione o Estado</h2>
              <ul data-simplebar data-simplebar-auto-hide="false">
                <li>
                  <label><input type="checkbox" name="1" id="1" /><span>Teste 1</span></label>
                </li>

              </ul>
            </section>
            <section class="search-filter">
              <h2 class="search-filter__title">Selecione o Setor</h2>
              <ul data-simplebar data-simplebar-auto-hide="false">
                <li>
                    <label><input type="checkbox" name="1" id="1" /><span>Teste 1</span></label>
                </li>
              </ul>
            </section>
            <section class="search-filter">
              <h2 class="search-filter__title">Selecione a Escolaridade</h2>
              <ul data-simplebar data-simplebar-auto-hide="false">
                <li>
                    <label><input type="checkbox" name="1" id="1" /><span>Teste 1</span></label>
                </li>
              </ul>
            </section>
          </div>
  
          <div class="col-xs-12 col-md-8 col-md-offset-1">
            <section class="openings-card__container">
              <article class="openings-card">
                <section class="openings-card__header">
                  <div class="openings-card__headerinfo">
                    <h4 class="openings-card__subtitle">
                      <a href="#">Nome da Loja</a>
                    </h4>
                    <h2 class="openings-card__title">
                      <a href="#">Líder de vendas e Marketing</a>
                    </h2>
                    <h5>Auxiliar/Operacional</h5>
                  </div>
                  <a href="#" class="openings-card__openings">Cadastre-se | 10 vagas</a>
                </section>
                <section class="openings-card__description">
                  <h3>Descrição das Atividades:</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. Pellentesque.
                  </p>
                </section>
                <footer class="openings-card__footer">
                  <p class="openings-card__location">
                    <i class="fas fa-map-marker-alt"></i>&nbsp;São Paulo
                  </p>
                  <p class="openings-card__date">
                    <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                  </p>
                </footer>
              </article>
              <article class="openings-card">
                <section class="openings-card__header">
                  <div class="openings-card__headerinfo">
                    <h4 class="openings-card__subtitle">
                      <a href="#">Nome da Loja</a>
                    </h4>
                    <h2 class="openings-card__title">
                      <a href="#">Líder de vendas e Marketing</a>
                    </h2>
                    <h5>Auxiliar/Operacional</h5>
                  </div>
                  <a href="#" class="openings-card__openings">Cadastre-se | 10 vagas</a>
                </section>
                <section class="openings-card__description">
                  <h3>Descrição das Atividades:</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. Pellentesque.
                  </p>
                </section>
                <footer class="openings-card__footer">
                  <p class="openings-card__location">
                    <i class="fas fa-map-marker-alt"></i>&nbsp;São Paulo
                  </p>
                  <p class="openings-card__date">
                    <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                  </p>
                </footer>
              </article>
              <article class="openings-card">
                <section class="openings-card__header">
                  <div class="openings-card__headerinfo">
                    <h4 class="openings-card__subtitle">
                      <a href="#">Nome da Loja</a>
                    </h4>
                    <h2 class="openings-card__title">
                      <a href="#">Líder de vendas e Marketing</a>
                    </h2>
                    <h5>Auxiliar/Operacional</h5>
                  </div>
                  <a href="#" class="openings-card__openings">Cadastre-se | 10 vagas</a>
                </section>
                <section class="openings-card__description">
                  <h3>Descrição das Atividades:</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. Pellentesque.
                  </p>
                </section>
                <footer class="openings-card__footer">
                  <p class="openings-card__location">
                    <i class="fas fa-map-marker-alt"></i>&nbsp;São Paulo
                  </p>
                  <p class="openings-card__date">
                    <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                  </p>
                </footer>
              </article>
              <article class="openings-card">
                <section class="openings-card__header">
                  <div class="openings-card__headerinfo">
                    <h4 class="openings-card__subtitle">
                      <a href="#">Nome da Loja</a>
                    </h4>
                    <h2 class="openings-card__title">
                      <a href="#">Líder de vendas e Marketing</a>
                    </h2>
                    <h5>Auxiliar/Operacional</h5>
                  </div>
                  <a href="#" class="openings-card__openings">Cadastre-se | 10 vagas</a>
                </section>
                <section class="openings-card__description">
                  <h3>Descrição das Atividades:</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. Pellentesque.
                  </p>
                </section>
                <footer class="openings-card__footer">
                  <p class="openings-card__location">
                    <i class="fas fa-map-marker-alt"></i>&nbsp;São Paulo
                  </p>
                  <p class="openings-card__date">
                    <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                  </p>
                </footer>
              </article>
              <article class="openings-card">
                <section class="openings-card__header">
                  <div class="openings-card__headerinfo">
                    <h4 class="openings-card__subtitle">
                      <a href="#">Nome da Loja</a>
                    </h4>
                    <h2 class="openings-card__title">
                      <a href="#">Líder de vendas e Marketing</a>
                    </h2>
                    <h5>Auxiliar/Operacional</h5>
                  </div>
                  <a href="#" class="openings-card__openings">Cadastre-se | 10 vagas</a>
                </section>
                <section class="openings-card__description">
                  <h3>Descrição das Atividades:</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. dolor sit amet, consectetur adipiscing elit.
                    Phasellus auctor consectetur ante, quis aliquam erat
                    pellentesque ut. Pellentesque.
                  </p>
                </section>
                <footer class="openings-card__footer">
                  <p class="openings-card__location">
                    <i class="fas fa-map-marker-alt"></i>&nbsp;São Paulo
                  </p>
                  <p class="openings-card__date">
                    <i class="fas fa-calendar"></i>&nbsp;26/05/2019
                  </p>
                </footer>
              </article>
            </section>
            <div class="row ">
              <div class="col-xs-12 hide show-md">
                <button class="openings-card__see-more">Carregar Mais</button>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection