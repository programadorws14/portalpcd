<div class="row">
    @csrf

    @if(!empty($empresa))
        <input type="hidden" class="form-control" value="{{ $empresa->id ?? null }}" name="id" required>
    @endif

    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
        <input type="text" class="form-control" value="{{ $empresa->nome ?? old('nome') }}" name="nome" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">E-mail</div>
            </div>
            <input type="email" id="emailPerfil" class="form-control" value="{{ $empresa->email ?? old('email') }}" name="email" required>
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
                <div class="input-group-text">Telefone</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->telefone ?? old('telefone') }}" name="telefone">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">CNPJ</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->cnpj ?? old('cnpj') }}" name="cnpj">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Tamanho</div>
            </div>
            <select name="tamanho_empresa" class="form-control">
                <option @if(!empty($empresa) && $empresa->tamanho_empresa == '1_10') selected @endif value="1_10">0-10</option>
                <option @if(!empty($empresa) && $empresa->tamanho_empresa == '11_50') selected @endif value="11_50">11-50</option>
                <option @if(!empty($empresa) && $empresa->tamanho_empresa == '51_100') selected @endif value="51_100">51-100</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Data Fundação</div>
            </div>
            <input type="date" class="form-control" value="{{ ( !empty($empresa->data_fundacao) ? date('Y-m-d', strtotime( $empresa->data_fundacao)) : old('data_fundacao') ) }}" name="data_fundacao">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Especialidades</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->especialidades ?? old('especialidades') }}" name="especialidades">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Estado Empresa</div>
            </div>
            <select name="estado_empresa" class="form-control">
                <option @if(!empty($empresa) && $empresa->Privada == 'Privada') selected @endif value="Privada">Privada</option>
                <option @if(!empty($empresa) && $empresa->Publica == 'Publica') selected @endif value="Publica">Pública</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Site</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->site_empresa ?? old('site_empresa') }}" name="site_empresa">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Foto</div>
            </div>
            <input type="file" class="form-control" value="" name="logo_empresa">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">CEP</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->cep ?? old('cep') }}" id="cep" name="cep">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Rua</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->rua ?? old('rua') }}" id="rua" name="rua" @if(empty($empresa->rua)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Número</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->numero ?? old('numero') }}" id="numero" name="numero" @if(empty($empresa->numero)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Complemento</div>
            </div>
            <input type="text" class="form-control" value="{{ $empresa->complemento ?? old('complemento') }}" id="complemento" name="complemento" @if(empty($empresa)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Bairro</div>
            </div>
            <input type="text" class="form-control" id="bairro" value="{{ $empresa->bairro ?? old('bairro') }}" name="bairro" @if(empty($empresa->bairro)) disabled @endif>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Cidade</div>
            </div>
            <input type="text" class="form-control" id="cidade" value="{{ $empresa->cidade ?? old('cidade') }}" name="cidade" @if(empty($empresa->cidade)) disabled @endif>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Estado</div>
            </div>
            <input type="text" class="form-control" id="estado" value="{{ $empresa->estado ?? old('estado') }}" name="estado" @if(empty($empresa->estado)) disabled @endif>
        </div>
    </div>
</div>