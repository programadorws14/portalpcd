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
           
            <form action="{{ route('empresa.vaga.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Abrir Vaga</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data Abertura</div>
                                    </div>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="data_abertura" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data Fechamento</div>
                                    </div>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime('+1Month')) }}" name="data_vencimento" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Titulo da Vaga</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('titulo') ? "is-invalid" : ""}}" name="titulo" required>
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
                                    <select name="status" class="form-control {{$errors->has('status') ? "is-invalid" : ""}}" required>
                                        <option value="1">Ativo</option>
                                        <option value="2">Inativo</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <textarea class="form-control {{$errors->has('descricao') ? "is-invalid" : ""}}" name="descricao" rows='10' placeholder="Descrição completa" required></textarea>
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('descricao') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Estado</div>
                                    </div>
                                    <select name="estado_id" class="form-control {{$errors->has('estado_id') ? "is-invalid" : ""}}" id="estado" required>
                                        <option value="">Selecione o Estado</option>
                                        @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nome. ' - '. $estado->sigla ?? null }}</option>
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
                                    <select name="municipio_id" class="form-control {{$errors->has('municipio_id') ? "is-invalid" : ""}}" id="municipio" disabled required>
                                        <option>Selecione o Estado</option>
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
                                    <input type="text" class="form-control {{$errors->has('cep') ? "is-invalid" : ""}}" id="cep" name="cep" required>
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
                                    <input type="text" class="form-control {{$errors->has('endereco') ? "is-invalid" : ""}}" id="endereco" name="endereco" required>
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
                                    <input type="text" class="form-control" name="salario" placeholder="Deixe em Banco para 'A Combinar' ">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Quntidade Vagas</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('qtd_vagas') ? "is-invalid" : ""}}" name="qtd_vagas" required>
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('qtd_vagas') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Horário de Trablho</div>
                                    </div>
                                    <input type="text" class="form-control {{$errors->has('horario') ? "is-invalid" : ""}}" name="horario" placeholder="Seg a Qui 08:00 às 18:00 /  Sex 08:00 às 17:00 " required>
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
                                    <select name="profissao_id" class="form-control {{$errors->has('profissao_id') ? "is-invalid" : ""}}" required>
                                        <option value="">Selecione a profissão </option>
                                        @foreach($profissoes as $profissao)
                                        <option value="{{ $profissao->id }}">{{ $profissao->descricao ?? null }}</option>
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
                                    <input type="text" class="form-control" name="info_adicionais">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Cadastrar</button>
                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Voltar</a>
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

    $("#estado").change(function() {
        if ($("#estado").val() != '') {
            $.ajax({
                type: 'get',
                url: '/empresa/vaga/getEstado/' + $("#estado").val(),
                beforeSend: function() {
                    $("#municipio").attr('disabled', false);
                    $("#municipio").append('<option selected>Carregando...</option>');
                },
                success: function(data) {
                    $("#municipio").empty();
                    data.forEach(function(valor, chave) {
                        $("#municipio").append("<option value='" + valor['id'] + "'>" + valor['nome'] + "</option>");
                    });
                }
            });
        } else {
            $("#municipio").empty();
            $("#municipio").append('<option selected>Selecione um estado</option>');
            $("#municipio").attr('disabled', true);
        }
    });
</script>
@endsection