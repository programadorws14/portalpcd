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


@endsection