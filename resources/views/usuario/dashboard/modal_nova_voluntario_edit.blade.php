<div class="modal-new modal-edit-voluntario">
    <div class="close">
        <span></span>
        <span></span>
    </div>
    <form action="{{ route('usuario.update.voluntario') }}" method="POST" class="dados">
        @csrf
        <input type="hidden" value="" name="id" id="id_voluntario">
        <div class="header">
            <a href="#" class="delete">Excluir</a>
            <h3 class="form-title">Informações do Voluntariado</h3>
        </div>
        <div class="campo">
            <label for="nome_instituicao_voluntario">Nome da Institução</label>
            <input type="text" name="nome_instituicao_voluntario" id="nome_instituicao_voluntario">
        </div>
        <div class="campo">
            <label for="cargo_voluntario">Cargo</label>
            <input type="text" name="cargo_voluntario" id="cargo_voluntario">
        </div>
        <div class="campo">
            <label for="data_inicio">Data início</label>
            <input type="date" name="data_inicio" id="data_inicio_voluntario">
        </div>
        <div class="campo">
            <label for="data_termino">Data término/previsão</label>
            <input type="date" name="data_termino" id="data_termino_voluntario">
        </div>
        <div class="campo full">
            <label for="recomendacoes_premiacoes">Recomendações ou
                premiações</label>
            <input type="text" name="recomendacoes_premiacoes" id="recomendacoes_premiacoes_voluntario">
        </div>
        <div class="campo full">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao_voluntario"></textarea>
        </div>

        <div class="area-botao">
            <div class="campo">
                <input type="submit" value="Atualizar">
            </div>
        </div>
    </form>
</div>