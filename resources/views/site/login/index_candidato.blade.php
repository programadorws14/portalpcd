@extends('layouts.app')
@section('content')
<section class="login">
    <div class="login-container">
        <header class="section-heading  pcd-container">
            <h1><strong>Login</strong></h1>
            <hr />
        </header>
        <div class="forms-area">
            <form action="{{ route('usuario.login') }}" style="margin:0 auto !important;" class="default-form" id="candidato" method="POST">
                @csrf
                <h2 class="form-title">Sou candidato - Quero me logar</h2>
                <input type="email" placeholder="Digite seu e-mail" name="email">
                <input type="password" placeholder="Digite sua senha" name="password">
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>
</section>

<header class="section-heading  pcd-container">
    <h2><strong>SEJA UM CANDIDATO - CADASTRE-SE</strong></h2>
    <hr />
</header>

<section class="submit-cv-cta  pcd-container">
    <div class="submit-cv-cta__description">
        <h1>MAIS DE 25.000.000 VAGAS CADASTRADAS</h1>
        <h2>
            Encontre a sua
        </h2>
    </div>
    <a href="#">Cadastre Aqui</a>
</section>

<section class="cadastro-vagas-curriculo">
    <div class="cadastro-vagas-curriculo-container">
        <div class="wrap-cards">
            <div class="card">
                <h2 class="card-title">Cadastro candidato</h2>
                <h2 class="card-sub-title">Para candidatar-se a essa vaga anuncie seu CV</h2>

                <ul>
                    <li>Lorem, ipsum.</li>
                    <li>Lorem, ipsum.</li>
                    <li>Lorem, ipsum.</li>
                    <li>Lorem, ipsum.</li>
                </ul>
            </div>
            <div class="card" id="bloc_cad_candidato">
                <h2 class="card-title">Cadastro candidato</h2>
                <form action="{{ route('usuario.create.store') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Digite seu nome*" name="nome" required>
                    <input type="text" placeholder="Digite seu sobrenome*" required>
                    <input type="email" placeholder="Digite seu email*" name="email" required>
                    <input type="password" placeholder="Digite sua senha*" name="password" required>
                    <input type="text" placeholder="Digite seu CEP*" name="cep" id="cep_candidato" required>
                    <input type="hidden" name="rua" value="" id="rua_candidato" />
                    <input type="hidden" name="complemento" value="" id="complemento_candidato" />
                    <input type="hidden" name="bairro" value="" id="bairro_candidato" />
                    <input type="hidden" name="cidade" value="" id="cidade_candidato" />
                    <input type="hidden" name="estado" value="" id="estado_candidato" />

                    <input type="text" placeholder="Digite seu cargo desejado*" required>
                    <div class="area-botao">
                        <input type="submit" value="Continuar">
                    </div>
                    <p>Ao clicar em continuar, você aceita as <a href="#">Condições Legais</a> e a <a href="#">Política de Privacidade</a> da Busca PcD.</p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection