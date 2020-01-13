@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.gerenciar.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">Cadastrar Usuário</div>
                    <div class="card-body">
                        @if(Session('success'))
                        <div class="alert alert-success">
                            <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
                        </div>
                        @elseif(Session('error'))
                        <div class="alert alert-danger">
                            <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
                        </div>
                        @endif
                        @include('admin.gerenciar_usuario._form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="bntSubmit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                        <a href="{{ route('admin.gerenciar.usuarios') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Cancelar</a>
                    </div>
               
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    $("#emailPerfil").change(function() {
        var email = $("#emailPerfil").val();
        if (email != '') {
            $.get(route('usuario.verifica.email', email), function(data) {
                if (data.status == 'sucesso') {
                    $("#emailPerfil").addClass('is-invalid')
                    $("#msgErroMail").html('E-mail já existe, tente outro').fadeIn('slow');
                    $("#bntSubmit").prop('disabled', true);
                } else if (data.status == 'error') {
                    $("#emailPerfil").removeClass('is-invalid')
                    $("#msgErroMail").fadeOut('slow');
                    $("#bntSubmit").prop('disabled', false);
                }
            });
        }
    });

    $("#cep").change(function() {
        var cep = $("#cep").val();
        if (cep != '') {
            $.get('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
                if (data != '') {
                    $("#rua").val(data['logradouro']).prop('disabled', false);
                    $("#numero").prop('disabled', false);
                    $("#complemento").val(data['complemento']).prop('disabled', false);
                    $("#cidade").val(data['localidade']).prop('disabled', false);
                    $("#bairro").val(data['bairro']).prop('disabled', false);
                    $("#estado").val(data['uf']).prop('disabled', false);
                } else {
                    $("#rua").val('').prop('disabled', true);
                    $("#numero").prop('disabled', true);
                    $("#complemento").val('').prop('disabled', true);
                    $("#cidade").val('').prop('disabled', true);
                    $("#bairro").val('').prop('disabled', true);
                    $("#estado").val('').prop('disabled', true);
                }
            });
        } else {
            $("#rua").val('').prop('disabled', true);
            $("#numero").prop('disabled', true);
            $("#complemento").val('').prop('disabled', true);
            $("#cidade").val('').prop('disabled', true);
            $("#bairro").val('').prop('disabled', true);
            $("#estado").val('').prop('disabled', true);
        }
    });
</script>
@endsection