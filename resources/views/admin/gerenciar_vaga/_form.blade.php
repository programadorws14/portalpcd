<div class="row">
    @csrf

    @if(!empty($vaga))
    <input type="hidden" class="form-control" value="{{ $vaga->id ?? null }}" name="id" required>
    @endif

    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Empresa</div>
            </div>
            <select name="empresa_id" class="form-control">
                <option value="">Selecione</option>
                @if(count($empresas) > 0)
                @foreach($empresas as $empresa)
                <option @if(!empty($vaga->empresa_id) && $vaga->empresa_id == $empresa->id) selected @endif value="{{ $empresa->id ?? null }}">{{ $empresa->nome ?? null }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Titulo</div>
            </div>
            <input type="text" class="form-control" value="{{ $vaga->titulo ?? old('titulo') }}" name="titulo">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Salário Acombinar </div>
            </div>
            <select name="salario_acombinar" id="salario_acombinar" class="form-control">
                <option @if(!empty($vaga) && $vaga->salario_acombinar != '') selected @endif value="Sim">Sim</option>
                <option @if(!empty($vaga) && $vaga->salario_acombinar == '') selected @endif value="Não">Não</option>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Salário de:</div>
            </div>
            <input type="text" id="salario_de" class="form-control" value="{{ $vaga->salario_de ?? old('salario_de') }}" name="salario_de" disabled>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Salário ate:</div>
            </div>
            <input type="text" id="salario_ate" class="form-control" value="{{ $vaga->salario_ate ?? old('salario_ate') }}" name="salario_ate" disabled>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Pausar Vaga</div>
            </div>
            <select name="pausar_vaga" class="form-control">
                <option value="">Selecione</option>
                <option @if(!empty($vaga) && $vaga->pausar_vaga != '') selected @endif value="Sim">Sim</option>
                <option @if(!empty($vaga) && $vaga->pausar_vaga == '') selected @endif value="Não">Não</option>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Tipo Emprego</div>
            </div>
            <select name="tipo_emprego" class="form-control">
                <option value="">Selecione</option>
                <option @if(!empty($vaga) && $vaga->tipo_emprego == 'CLT') selected @endif value="CLT">CLT</option>
                <option @if(!empty($vaga) && $vaga->tipo_emprego == 'PJ') selected @endif value="PJ">PJ</option>
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Número Vaga(s)</div>
            </div>
            <input type="text" class="form-control" value="{{ $vaga->numero_vagas ?? old('numero_vagas') }}" name="numero_vagas">
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Descrição</div>
            </div>
            <textarea class="form-control" name="descricao_vaga" rows="3">{{ $vaga->descricao_vaga ?? old('descricao_vaga') }}</textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">CEP</div>
            </div>
            <input type="text" class="form-control" value="{{ $vaga->cep ?? old('cep') }}" id="cep" name="cep">
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Rua</div>
            </div>
            <input type="text" class="form-control" value="{{ $vaga->rua ?? old('rua') }}" id="rua" name="rua" @if(empty($vaga->rua)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Número</div>
            </div>
            <input type="text" class="form-control" value="{{ $vaga->numero ?? old('numero') }}" id="numero" name="numero" @if(empty($vaga->numero)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Complemento</div>
            </div>
            <input type="text" class="form-control" value="{{ $vaga->complemento ?? old('complemento') }}" id="complemento" name="complemento" @if(empty($vaga)) disabled @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Bairro</div>
            </div>
            <input type="text" class="form-control" id="bairro" value="{{ $vaga->bairro ?? old('bairro') }}" name="bairro" @if(empty($vaga->bairro)) disabled @endif>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Cidade</div>
            </div>
            <input type="text" class="form-control" id="cidade" value="{{ $vaga->cidade ?? old('cidade') }}" name="cidade" @if(empty($vaga->cidade)) disabled @endif>
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text">Estado</div>
            </div>
            <input type="text" class="form-control" id="estado" value="{{ $vaga->estado ?? old('estado') }}" name="estado" @if(empty($vaga->estado)) disabled @endif>
        </div>
    </div>
</div>