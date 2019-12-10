<div class="modal-new modal-nova-experiencia">
    <div class="close">
        <span></span>
        <span></span>
    </div>
<form action="{{ route('usuario.add.experiencia') }}" class="dados" method="POST">
        @csrf
        <input type="hidden" value="{{ Auth::guard('usuario')->user()->id }}" name="usuario_id" >
        <div class="header">
            <a href="#" class="delete">Excluir</a>
            <h3 class="form-title">Informações da Experiência</h3>
        </div>
        <div class="campo">
            <label for="nome_empresa">Nome Empresa</label>
            <input type="text" name="nome_empresa" >
        </div>
        <div class="campo">
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo">
        </div>
        <div class="campo">
            <label for="data_inicio">Data início</label>
            <input type="date" name="data_inicio">
        </div>
        <div class="campo">
            <label for="data_termino">Data término/previsão</label>
            <input type="date" name="data_termino"  >
        </div>
        <div class="campo">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" >
        </div>
        <div class="campo full">
            <label for="descricao">Descrição</label>
            <textarea name="descricao"></textarea>
        </div>

        <div class="area-botao">
            <div class="campo">
                <input type="submit" value="Adicionar">
            </div>
        </div>
    </form>
</div>