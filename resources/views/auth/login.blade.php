@extends('layouts.app')

@section('content')

<section class="login">
    <div class="login-container">
        <header class="section-heading  pcd-container">
            <h1><strong>Login Administrador</strong></h1>
            <hr />
        </header>
        <div class="forms-area">
            <form action="{{ route('login') }}" style="margin:0 auto !important;" class="default-form" id="candidato" method="POST">
                @csrf
                <h2 class="form-title">Sou Administrador - Quero me logar</h2>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="email" placeholder="Digite seu e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                   
                <input type="password" placeholder="Digite sua senha" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password">
                 
                    <input style="display:none;" class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>
</section>
@endsection
