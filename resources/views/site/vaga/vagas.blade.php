@extends('layouts.app')
@section('content')

@php

Session::forget('estado');
Session::forget('pesquisa-text');

if(!empty($_GET['estado'])){
Session::put('estado', $_GET['estado']);
}

if(!empty($_GET['pesquisa-text'])){
Session::put('pesquisa-text', $_GET['pesquisa-text']);
}
@endphp

<div class="wrapper container-fluid">
  <header class="section-heading">
    <h1>Encontre <strong>Sua Vaga</strong></h1>
    <hr />
  </header>

  <div class="hide show-md">
    <nav class="openings-filter ">
      <h1>Refine sua busca</h1>
      <form action="" method="GET">
        <div class="search-input">

          <input type="text" name="pesquisa-text" placeholder="Buscar vagas..." value="{{ ( $pesquisa_texto ? $pesquisa_texto : '' ) }}" />

          @if (!empty($estados_sel) && count($estados_sel) > 0)
          @foreach ($estados_sel as $sel)
          <input type="hidden" name="estado[]" value="{{ $sel }}" placeholder="Buscar vagas..." />
          @endforeach
          @endif
          <button type="submit" style="background: none; border:none;"><i class="fas fa-search"></i></button>

        </div>
      </form>
      <p>Adicionadas recentemente <i class="fas fa-chevron-down"></i></p>
    </nav>
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-3">
      <form action="" id="form-pesquisa-filtro" method="GET">

        <section class="search-filter">
          <h2 class="search-filter__title">Selecione o Estado</h2>
          <ul data-simplebar data-simplebar-auto-hide="false">

            @if(!empty($pesquisa_texto))
            <input type="hidden" name="pesquisa-text" value="{{ $pesquisa_texto }}" placeholder="Buscar vagas..." />
            @endif

            @if (count($estados) > 0)
            @foreach ($estados as $estado)

            <li>
              <label><input type="checkbox" name="estado[]" value="{{ $estado->estado }}" @if (!empty($estados_sel) && count($estados_sel)> 0)
                @foreach ($estados_sel as $sel)
                @if($estado->estado == $sel)
                checked
                @endif
                @endforeach
                @endif /><span>{{ $estado->estado }}</span></label>
            </li>
            @endforeach
            @endif
          </ul>
        </section>
        {{-- <section class="search-filter">
          <h2 class="search-filter__title">Selecione o Setor</h2>
          <ul data-simplebar data-simplebar-auto-hide="false">
            <li>
              <label><input type="checkbox" name="1" /><span>Teste 1</span></label>
            </li>
          </ul>
        </section>
        <section class="search-filter">
          <h2 class="search-filter__title">Selecione a Escolaridade</h2>
          <ul data-simplebar data-simplebar-auto-hide="false">
            <li>
              <label><input type="checkbox" name="1" /><span>Teste 1</span></label>
            </li>
          </ul>
        </section> --}}
      </form>
    </div>


    <div class="col-xs-12 col-md-8 col-md-offset-1">
      <section class="openings-card__container">

        @if(count($vagas) > 0)
        @foreach($vagas as $vaga)
        <article class="openings-card">
          <section class="openings-card__header">
            <div class="openings-card__headerinfo">
              <h4 class="openings-card__subtitle">
                <a href="{{ route('site.vagas.show', $vaga->id) }}">{{ $vaga->empresa->nome ?? null }}</a>
              </h4>
              <h2 class="openings-card__title">
                <a href="{{ route('site.vagas.show', $vaga->id) }}">{{ $vaga->titulo ?? null }}</a>
              </h2>
              <!-- <h5>Auxiliar/Operacional</h5> -->
            </div>
            <a href="{{ route('site.vagas.show', $vaga->id) }}" class="openings-card__openings">Cadastre-se | {{ $vaga->numero_vagas ?? null }}</a>
          </section>
          <section class="openings-card__description">
            <h3>Descrição das Atividades:</h3>
            <p>{{ substr($vaga->descricao_vaga, 0, 311) ?? null }}
            </p>
          </section>
          <footer class="openings-card__footer">
            <p class="openings-card__location">
              <i class="fas fa-map-marker-alt"></i>&nbsp;{{ $vaga->cidade }} - {{ $vaga->estado }}
            </p>
            <p class="openings-card__date">
              <i class="fas fa-calendar"></i>&nbsp;{{ date('d/m/Y', strtotime($vaga->created_at)) }}
            </p>
          </footer>
        </article>
        @endforeach
        @else

        <div class="col-xs-12 col-md-8 col-md-offset-1" style="text-align: center;">
          <h3>Vagas não encontradas</h3>
          <p>Ainda não encontramos vagas com as suas espeficiações</p>

          <a href="{{ route('site.vagas') }}" style="text-decoration: none; font-weight:bold;" class="openings-card__see-more">Ver Vagas Disponíveis</a>
        </div>
        @endif

        @if(count($vagas) > 0)
        <div class="row ">
          <div class="col-xs-12 hide show-md">
            <button type="button" class="openings-card__see-more" id="carregarMaisVagas">Carregar Mais</button>
          </div>
        </div>
        @endif
    </div>
  </div>
</div>
@endsection