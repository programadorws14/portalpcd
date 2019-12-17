@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{ route('admin.gerenciar.vaga.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Cadastrar Vaga</div>
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
                @include('admin.gerenciar_vaga._form')
            </div>
            <div class="card-footer">
                <button type="submit" id="bntSubmit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                <a href="{{ route('admin.gerenciar.vagas') }}" class="btn btn-danger"><i class="fas fa-save"></i> Cancelar</a>
            </div>

        </div>
</div>
</form>
</div>
@endsection

@section('scripts')
<script>
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

    $('#salario_acombinar').change(function() {
        let salario_acombinar = $('#salario_acombinar');
        let salario_de = $('#salario_de');
        let salario_ate = $('#salario_ate');

        if (salario_acombinar.val() == 'Sim') {
            salario_de.prop('disabled', true);
            salario_ate.prop('disabled', true);
        } else {
            salario_de.prop('disabled', false);
            salario_ate.prop('disabled', false);
        }
    });
</script>
@endsection