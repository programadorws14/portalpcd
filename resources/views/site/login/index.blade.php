@extends('layouts.app')
@section('content')
<section class="login">
    <div class="login-container">
        <header class="section-heading  pcd-container">
            <h1><strong>Login</strong></h1>
            <hr />
        </header>
        <div class="forms-area">
            <form action="{{ route('usuario.login') }}" class="default-form" id="candidato" method="POST">
                @csrf
                <h2 class="form-title">Sou candidato - Quero me logar</h2>
                <input type="email" placeholder="Digite seu e-mail" name="email">
                <input type="password" placeholder="Digite sua senha" name="password">
                <input type="submit" value="Entrar">
            </form>

            <form action="{{ route('empresa.login') }}" class="default-form" id="empresa" method="POST">
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
            <div class="card">
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

<section class="cadastro-vagas-curriculo">
    <div class="cadastro-vagas-curriculo-container">
        <div class="wrap-cards">
            <div class="card">
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


@section('scripts')
<script>
    $("#emailPerfil").change(function() {
        var email = $("#emailPerfil").val();
        if (email != '') {
            $.get(route('empres.verifica.email', email), function(data) {
                if (data.status == 'sucesso') {
                    $("#emailPerfil").css('border', '1px solid red')
                    $("#msgErroEmail").html('E-mail já existe, tente outro').fadeIn('slow');
                    $("#atualizarPerfil").prop('disabled', true);
                } else if (data.status == 'error') {
                    $("#emailPerfil").css('border', '1px solid #eeeeee')
                    $("#msgErroEmail").fadeOut('slow');
                    $("#atualizarPerfil").prop('disabled', false);
                }
            });
        }
    });

    $("#cep_candidato").change(function() {
        var cep = $("#cep_candidato").val();
        if (cep != '') {
            $.get('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
                if (data != '') {
                    $("#rua_candidato").val(data['logradouro']);
                    $("#complemento_candidato").val(data['complemento']);
                    $("#cidade_candidato").val(data['localidade']);
                    $("#bairro_candidato").val(data['bairro']);
                    $("#estado_candidato").val(data['uf']);
                } else {
                    $("#rua_candidato").val('');
                    $("#complemento_candidato").val('');
                    $("#cidade_candidato").val('');
                    $("#bairro_candidato").val('');
                    $("#estado_candidato").val('');
                }
            });
        } else {
            $("#rua_candidato").val('');
            $("#complemento_candidato").val('');
            $("#cidade_candidato").val('');
            $("#bairro_candidato").val('');
            $("#estado_candidato").val('');
        }
    });
</script>
@endsection