<div class="modal-edit">
	<div class="close-edit">
		<span></span>
		<span></span>
	</div>



	<form action="{{ route('empresa.vaga.update') }}" id="form-edit-vaga" class="dados" method="POST">
		@csrf

		<div id="msgerro" style="color:#FFF; display:none; font-weight:bold; padding: 5px;  width:100%; background:red; font-size:16px; margin:20px 0;">
			Essa empresa não existe
		</div>

		<input type="hidden" name="vaga_id" id="vaga_id">
		<input type="hidden" name="empresa_id" value="{{ Auth::guard('empresa')->user()->id }}">
		<div class="header">
			<a href="#" id="excluir_vaga" class="delete">Excluir</a>
			<h3 class="form-title">Informações da Vaga</h3>
		</div>
		<div class="campo full">
			<label for="titulo_vaga">Título da Vaga</label>
			<input type="text" name="titulo" id="titulo_vaga_vaga">
		</div>
		<div class="campo">
			<label for="faixa_de">Faixa salarial de: </label>
			<input type="number" name="salario_de" id="salario_de_vaga">
		</div>
		<div class="campo">
			<label for="faixa_ate">Faixa salarial até: </label>
			<input type="number" name="salario_ate" id="salario_ate_vaga">
		</div>
		<div class="campo checkbox">
			<label for="pausar_vaga">Pausar vaga? </label>
			<input type="checkbox" name="pausar_vaga" id="pausar_vaga_vaga">
		</div>
		<div class="campo checkbox">
			<label for="combinar_salario">Salário à combinar? </label>
			<input type="checkbox" name="salario_acombinar" id="salario_acombinar_vaga">
		</div>
		<div class="campo">
			<label for="tipo_emprego">Tipo de emprego: </label>
			<select name="tipo_emprego" id="tipo_emprego_vaga">
				<option value="">Selecione o tipo...</option>
				<option value="CLT">CLT</option>
				<option value="PJ">PJ</option>
			</select>
		</div>
		<div class="campo">
			<label for="numero_de_vagas">Número de vagas </label>
			<input type="text" name="numero_vagas" id="numero_de_vagas_vaga">
		</div>
		<div class="campo full">
			<label for="descricao_vaga">Descrição da vaga</label>
			<textarea name="descricao_vaga" id="descricao_vaga"></textarea>
		</div>

		<h3>Endereço</h3>

		<div class="campo full">
			<label for="cep">CEP</label>
			<input type="text" name="cep" id="cep_edit_vaga">
		</div>

		<div class="campo">
			<label for="rua">Rua</label>
			<input type="text" name="rua" id="rua_edit_vaga">
		</div>

		<div class="campo">
			<label for="numero">Número</label>
			<input type="text" name="numero" id="numero_edit_vaga">
		</div>

		<div class="campo">
			<label for="complemento">Complemento</label>
			<input type="text" name="complemento" id="complemento_edit_vaga">
		</div>

		<div class="campo">
			<label for="bairro">Bairro</label>
			<input type="text" name="bairro" id="bairro_edit_vaga">
		</div>

		<div class="campo">
			<label for="cidade">Cidade</label>
			<input type="text" name="cidade" id="cidade_edit_vaga">
		</div>

		<div class="campo">
			<label for="estado">Estado</label>
			<input type="text" name="estado" id="estado_edit_vaga">
		</div>

		<div class="area-botao">
			<!-- <div id="vaga-atualizar-msg" class="alert alert-success" style="margin:20px 0; color:green; display:none;">
				<b><i class="fas fa-check"></i> Atualizado com sucesso!</b>
			</div> -->
			<div class="campo">
				<input type="submit" id="atualizar-vaga" value="Atualizar">
			</div>
		</div>
	</form>
</div>