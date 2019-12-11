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


@endsection