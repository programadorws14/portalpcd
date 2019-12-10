<div class="modal-new modal-nova-voluntario">
    <div class="close">
        <span></span>
        <span></span>
    </div>
    <form action="{{ route('usuario.add.voluntario') }}" method="POST" class="dados">
        @csrf
        <input type="hidden" value="{{ Auth::guard('usuario')->user()->id }}" name="usuario_id">
        <div class="header">
            <a href="#" class="delete">Excluir</a>
            <h3 class="form-title">Informações do Voluntariado</h3>
        </div>
        <div class="campo">
            <label for="nome_instituicao_voluntario">Nome da Institução</label>
            <input type="text" name="nome_instituicao_voluntario">
        </div>
        <div class="campo">
            <label for="cargo_voluntario">Cargo</label>
            <input type="text" name="cargo_voluntario">
        </div>
        <div class="campo">
            <label for="data_inicio">Data início</label>
            <input type="date" name="data_inicio">
        </div>
        <div class="campo">
            <label for="data_termino">Data término/previsão</label>
            <input type="date" name="data_termino">
        </div>
        <div class="campo full">
            <label for="recomendacoes_premiacoes">Recomendações ou
                premiações</label>
            <input type="text" name="recomendacoes_premiacoes">
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