<div class="modal-new modal-edit-formacao">
    <div class="close">
        <span></span>
        <span></span>
    </div>
    <form action="{{ route('usuario.update.formacao') }}" class="dados" method="POST">
        @csrf
        <input type="hidden" value="" name="id" id="id_formacao">
        <div class="header">
            <a href="#" class="delete">Excluir</a>
            <h3 class="form-title">Informações da Formação</h3>
        </div>
        <div class="campo">
            <label for="nome_instituicao">Nome instituição</label>
            <input type="text" name="nome_instituicao" id="nome_instituicao_formacao">
        </div>
        <div class="campo">
            <label for="formacao">Formação</label>
            <input type="text" name="formacao" id="formacao">
        </div>
        <div class="campo">
            <label for="data_inicio">Data início</label>
            <input type="date" name="data_inicio" id="data_inicio_formacao">
        </div>
        <div class="campo">
            <label for="data_termino">Data término/previsão</label>
            <input type="date" name="data_termino" id="data_termino_formacao">
        </div>
        <div class="campo full">
            <label for="descricao_formacao">Descrição</label>
            <textarea name="descricao_formacao" id="descricao_formacao"></textarea>
        </div>
        <div class="campo full">
            <label for="recomendacoes_premiacoes">Recomendações ou
                premiações</label>
            <input type="text" name="recomendacoes_premiacoes" id="recomendacoes_premiacoes">
        </div>

        <div class="area-botao">
            <div class="campo">
                <input type="submit" value="Atualizar">
            </div>
        </div>
    </form>
</div>