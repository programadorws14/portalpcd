<div class="modal-new modal-edit-experiencia">
    <div class="close">
        <span></span>
        <span></span>
    </div>
    <form action="{{ route('usuario.update.experiencia') }}" class="dados" method="POST">
        @csrf
        <input type="hidden" value="" name="id" id="id">
        <div class="header">
            <a href="#" class="delete">Excluir</a>
            <h3 class="form-title">Informações da Experiência</h3>
        </div>
        <div class="campo">
            <label for="nome_empresa">Nome Empresa</label>
            <input type="text" name="nome_empresa" id="nome_empresa">
        </div>
        <div class="campo">
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="cargo">
        </div>
        <div class="campo">
            <label for="data_inicio">Data início</label>
            <input type="date" name="data_inicio" id="data_inicio">
        </div>
        <div class="campo">
            <label for="data_termino">Data término/previsão</label>
            <input type="date" name="data_termino" id="data_termino">
        </div>
        <div class="campo">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade">
        </div>
        <div class="campo full">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao"></textarea>
        </div>
        <div class="area-botao">
            <div class="campo">
                <input type="submit" value="Atualizar">
            </div>
        </div>
    </form>
</div>