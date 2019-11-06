@extends('admin.layouts.app')
@section('content')
<div class="container-fluid mt-3">
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

            <div class="col-md-12 mb-3">
                @if(!empty($edit->logo))
                <img style="border:1px solid #ccc;" src="{{ asset($edit->logo)}}" width="120" height="120 " class="img-fluid" alt="{{ $edit->nome }}" title="{{ $edit->nome }}">
                @else
                <img style="border:1px solid #ccc;" src="{{ asset('img/img-empresa.png')}}" width="120" height="120" class="img-fluid" alt="{{ $edit->nome }}" title="{{ $edit->nome }}">
                @endif
            </div>
            <form action="{{ route('admin.empresa.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $edit->id }}">
                <div class="card">
                    <div class="card-header">Editando: <b>{{ $edit->nome }}</b></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Logotipo</div>
                                    </div>
                                    <input type="file" class="form-control" value="" accept="image/*" name="logo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nome</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->nome ?? null }}" name="nome">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">E-mail</div>
                                    </div>
                                    <input type="email" class="form-control" value="{{ $edit->email ?? null }}" name="email">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Senha</div>
                                    </div>
                                    <input type="password" class="form-control" value="" name="password">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Descrição</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->descricao ?? null}}" name="descricao">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Ramo</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->ramo ?? null }}" name="ramo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Qtd Funcionários</div>
                                    </div>
                                    <input type="number" class="form-control" value="{{ $edit->qtd_funcionarios ?? null }}" name="qtd_funcionarios">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Data Fundação</div>
                                    </div>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime($edit->data_fundacao)) ?? null }}" name="data_fundacao">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Especialidades</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->especialidades ?? null }}" name="especialidades">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Organização</div>
                                    </div>
                                    <select class="form-control" name="organizacao">
                                        <option value="">Selecione organização</option>
                                        <option @if($edit->organizacao == 'Privada') selected @endif value="Privada">Privada</option>
                                        <option @if($edit->organizacao == 'Pública') selected @endif value="Pública">Pública</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Links</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->links ?? null }}" name="links">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Telefone</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->telefone ?? null }}" name="telefone">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">CEP</div>
                                    </div>
                                    <input type="text" class="form-control" id="cep" value="{{ $edit->cep ?? null }}" name="cep">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Endereço</div>
                                    </div>
                                    <input type="text" id="endereco" class="form-control" value="{{ $edit->endereco ?? null }}" name="endereco">
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
                                        <option @if($estado->id == $edit->estado_id) selected @endif value="{{ $estado->id }}">{{ $estado->nome. ' - '. $estado->sigla ?? null }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Municipio</div>
                                    </div>
                                    <select name="municipio_id" class="form-control {{$errors->has('municipio_id') ? "is-invalid" : ""}}" id="municipio" required>
                                        @foreach($municipios as $municipio)
                                        <option @if($municipio->id == $edit->municipio_id) selected @endif value="{{ $municipio->id }}">{{ $municipio->nome ?? null }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Site</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->site ?? null }}" name="site">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Urls</div>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $edit->url ?? null }}" name="url">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</button>
                        <a href="{{ route('admin.empresa.listar') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Cancelar</a>
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