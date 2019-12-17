<div class="row">
    @csrf

    @if(!empty($usuario))
        <input type="hidden" class="form-control" value="{{ $usuario->id ?? null }}" name="id" required>
    @endif

    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
        <input type="text" class="form-control" value="{{ $usuario->nome ?? old('nome') }}" name="nome" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">E-mail</div>
            </div>
            <input type="email" id="emailPerfil" class="form-control" value="{{ $usuario->email ?? old('email') }}" name="email" required>
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
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">CPF</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->cpf ?? old('cpf') }}" name="cpf">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Data Nascimento</div>
            </div>
            <input type="date" class="form-control" value="{{ $usuario->data_nascimento ?? old('data_nascimento') }}" name="data_nascimento">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Sexo</div>
            </div>
            <select class="form-control" name="sexo">
                <option value="">Selecione</option>
                <option @if(!empty($usuario) && $usuario->sexo == 'Masculino') selected @endif value="Masculino">Masculino</option>
                <option @if(!empty($usuario) && $usuario->sexo == 'Feminino') selected @endif value="Feminino">Feminino</option>
                <option @if(!empty($usuario) && $usuario->sexo == 'Outros') selected @endif value="Outros">Outros</option>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Texto Sobre</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->texto_sobre_voce ?? old('texto_sobre_voce') }}" name="texto_sobre_voce">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Telefone Residencial</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->telefone_residencial ?? old('telefone_residencial') }}" name="telefone_residencial">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Telefone Comercial</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->telefone_comercial ?? old('telefone_comercial') }}" name="telefone_comercial">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Telefone Celular</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->telefone_celular ?? old('telefone_celular') }}" name="telefone_celular">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Foto</div>
            </div>
            <input type="file" class="form-control" value="" name="foto">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">CEP</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->cep ?? old('cep') }}" id="cep" name="cep">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Rua</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->rua ?? old('rua') }}" id="rua" name="rua" @if(empty($usuario->rua)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Número</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->numero ?? old('numero') }}" id="numero" name="numero" @if(empty($usuario->numero)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Complemento</div>
            </div>
            <input type="text" class="form-control" value="{{ $usuario->complemento ?? old('complemento') }}" id="complemento" name="complemento" @if(empty($usuario)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Bairro</div>
            </div>
            <input type="text" class="form-control" id="bairro" value="{{ $usuario->bairro ?? old('bairro') }}" name="bairro" @if(empty($usuario->bairro)) disabled @endif>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Cidade</div>
            </div>
            <input type="text" class="form-control" id="cidade" value="{{ $usuario->cidade ?? old('cidade') }}" name="cidade" @if(empty($usuario->cidade)) disabled @endif>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Estado</div>
            </div>
            <input type="text" class="form-control" id="estado" value="{{ $usuario->estado ?? old('estado') }}" name="estado" @if(empty($usuario->estado)) disabled @endif>
        </div>
    </div>
</div>