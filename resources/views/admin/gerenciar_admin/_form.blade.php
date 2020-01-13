<div class="row">
    @csrf

    @if(!empty($admin))
        <input type="hidden" class="form-control" value="{{ $admin->id ?? null }}" name="id" required>
    @endif

    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
        <input type="text" class="form-control" value="{{ $admin->nome ?? old('nome') }}" name="nome" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">E-mail</div>
            </div>
            <input type="email" id="emailPerfil" class="form-control" value="{{ $admin->email ?? old('email') }}" name="email" required>
            <small style="font-size:13px; color:red;  width:100%;" id="msgErroMail"></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Senha</div>
            </div>
            <input type="password" class="form-control" value="" name="password">
        </div>
    </div>
</div>