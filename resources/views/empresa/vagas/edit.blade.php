@extends('empresa.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session('success'))
            <div class="alert alert-success">
                <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
            </div>
            @elseif(Session('error'))
            <div class="alert alert-danger">
                <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
            </div>
            @endif
            <form action="{{ route('empresa.vaga.update') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $edit->id }}" name="id">
                <div class="card">
                    <div class="card-header">Editando: <b>{{ $edit->titulo ?? null }}</b></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data Abertura</div>
                                    </div>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime($edit->data_abertura)) }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data Fechamento</div>
                                    </div>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime($edit->data_vencimento)) }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Titulo da Vaga</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('titulo') ? "is-invalid" : ""}}" name="titulo" value="{{ ( old('titulo')  ? old('titulo') : $edit->titulo ) }}">
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Status</div>
                                    </div>
                                    <select name="status" class="form-control {{$errors->has('status') ? "is-invalid" : ""}}" @if($edit->status == 3 || $edit->status == 1 && $edit->aprovacao_user_id != '') disabled @endif >
                                        <option @if($edit->status == 1) selected @endif value="1">Ativo</option>
                                        <option @if($edit->status == 2) selected @endif value="2">Inativo</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <textarea class="form-control {{$errors->has('descricao') ? "is-invalid" : ""}}" name="descricao" rows='10' placeholder="Descrição completa">{{ ( old('descricao') ? old('descricao') : $edit->descricao ) }}</textarea>
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('descricao') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Estado</div>
                                    </div>
                                    <select name="estado_id" class="form-control {{$errors->has('estado_id') ? "is-invalid" : ""}}" id="estado">
                                        <option value="">Selecione o Estado</option>
                                        @foreach($estados as $estado)
                                        <option @if($edit->estado_id == $estado->id) selected @endif value="{{ $estado->id }}">{{ $estado->nome. ' - '. $estado->sigla ?? null }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('estado_id') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Municipio</div>
                                    </div>
                                    <select name="municipio_id" class="form-control {{$errors->has('municipio_id') ? "is-invalid" : ""}}" id="municipio">
                                        @foreach($municipios as $municipio)
                                        <option @if($edit->municipio_id == $municipio->id) selected @endif value="{{ $municipio->id }}">{{ $municipio->nome ?? null }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('municipio_id') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">CEP</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('cep') ? "is-invalid" : ""}}" id="cep" name="cep" value="{{ ( old('cep')  ? old('cep') : $edit->cep ) }}">
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Endereço</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('endereco') ? "is-invalid" : ""}}" id="endereco" name="endereco" value="{{ ( old('endereco')  ? old('endereco') : $edit->endereco ) }}">
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Benefícios</div>
                                    </div>
                                    <input type="text" class="form-control" name="beneficios" placeholder="Ex: Assistência médica / Assistência Odontologica">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Salário</div>
                                    </div>
                                    <input type="text" class="form-control" name="salario" placeholder="Deixe em Banco para 'A Combinar' " value="{{ ( old('salario')  ? old('salario') : $edit->salario ) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Quntidade Vagas</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('qtd_vagas') ? "is-invalid" : ""}}" name="qtd_vagas" value="{{ ( old('qtd_vagas')  ? old('qtd_vagas') : $edit->qtd_vagas ) }}">
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('qtd_vagas') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Horário de Trabalho</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('horario') ? "is-invalid" : ""}}" name="horario" placeholder="Seg a Qui 08:00 às 18:00 /  Sex 08:00 às 17:00" value="{{ ( old('qtd_vagas')  ? old('qtd_vagas') : $edit->qtd_vagas ) }}">
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('horario') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Profissão</div>
                                    </div>
                                    <select name="profissao_id" class="form-control {{$errors->has('profissao_id') ? "is-invalid" : ""}}">
                                        <option value="">Selecione a profissão </option>
                                        @foreach($profissoes as $profissao)
                                        <option @if($edit->profissao_id == $profissao->id) selected @endif value="{{ $profissao->id }}">{{ $profissao->descricao ?? null }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('profissao_id') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Informações Adicionais</div>
                                    </div>
                                    <input type="text" class="form-control" name="info_adicionais" value="{{ ( old('info_adicionais')  ? old('info_adicionais') : $edit->info_adicionais ) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</button>
                        <a href="{{ route('empresa.vaga.emandamento') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $("#cep").change(function() {
        var cep = $("#cep").val();
        if (cep != '') {
            $.get('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
                if (data != '') {
                    $("#endereco").val(data['logradouro']);
                } else {
                    $("#endereco").val('');
                }
            });
        } else {
            $("#endereco").val('');
        }
    });
</script>
@endsection