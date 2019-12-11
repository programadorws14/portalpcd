@extends('layouts.app')
@section('content')
<section class="login">
    <div class="login-container">
        <header class="section-heading  pcd-container">
            <h1><strong>Login</strong></h1>
            <hr />
        </header>
        <div class="forms-area">
            <form action="{{ route('empresa.login') }}" style="margin:0 auto;" class="default-form" id="empresa" method="POST">
                @csrf
                <h2 class="form-title">Sou empresa - Quero me logar</h2>
                <input type="email" name="email" placeholder="Digite seu e-mail" required>
                <input type="password" name="password" placeholder="Digite sua senha" required>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>
</section>

<header class="section-heading  pcd-container">
    <h2><strong>Cadastre sua empresa</strong></h2>
    <hr />
</header>

<section class="submit-cv-cta  pcd-container">
    <div class="submit-cv-cta__description">
        <h1>MAIS DE 25.000.000 DE CHANCES</h1>
        <h1>DE CONTRATAR O CANDIDATO CERTO</h1>
    </div>
    <a href="#">Cadastre Aqui</a>
</section>

<section class="cadastro-vagas-curriculo" >
    <div class="cadastro-vagas-curriculo-container">
        <div class="wrap-cards">
            <div class="card" id="bloc_cad_vaga_empresa">
                <h2 class="card-title">Anuncie grátis suas vagas</h2>

                @if(Session('success'))
                <div class="alert alert-success" style="color:green; font-size:14px;">
                    <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
                </div>
                @elseif(Session('error'))
                <div class="alert alert-danger" style="color:red; font-size:14px;">
                    <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
                </div>
                @endif

                <form action="{{ route('empresa.create.store') }}" method="POST">
                    @csrf

                    <small style="font-size:13px; color:red; display:none; margin:10px 0;" id="msgErroEmail"></small>

                    <input type="text" class="full" name="nome" placeholder="Nome Empresa" required>
                    <input type="email" name="email" placeholder="E-mail corporativo" id="emailPerfil" required>
                    <input type="password" name="password" placeholder="Senha de acesso" required>
                    <input type="text" placeholder="Cargo Vaga*" required>
                    <input type="tel" name="telefone" class="telefone" placeholder="Telefone comercial" required>
                    <div class="area-botao">
                        <input type="submit" value="Anunciar vaga" id="atualizarPerfil">
                    </div>
                    <p>Ao clicar em continuar, você aceita as <a href="#">Condições Legais</a> e a <a href="#">Política de Privacidade</a> da Busca PcD.</p>
                </form>
            </div>
            <div class="card">
                <h2 class="card-title">ENCONTRE CANDIDATOS EM TODAS AS REGIÕES</h2>
                <div class="sides">
                    <div class="l">
                        <img src="{{ asset('site/assets/images/mapa-brasil.png') }}" alt="Mapa">
                    </div>
                    <div class="r">
                        <h3>São Paulo: 8.308.581 candidatos</h3>
                        <ul>
                            <li>Lorem, ipsum.</li>
                            <li>Lorem, ipsum.</li>
                            <li>Lorem, ipsum.</li>
                            <li>Lorem, ipsum.</li>
                        </ul>
                        <button>BUSCAR CANDIDATOS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection