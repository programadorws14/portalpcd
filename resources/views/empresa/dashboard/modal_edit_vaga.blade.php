
<div class="modal-nova-vaga">
	<div class="close">
		<span></span>
		<span></span>
	</div>
	<form action="#" class="dados">
		<div class="header">
			<a href="#" class="delete">Excluir</a>
			<h3 class="form-title">Informações da Vaga</h3>
		</div>
		<div class="campo full">
			<label for="titulo_vaga">Título da Vaga</label>
			<input type="text" name="titulo_vaga" id="titulo_vaga">
		</div>
		<div class="campo">
			<label for="faixa_de">Faixa salarial de: </label>
			<input type="number" name="faixa_de" id="faixa_de">
		</div>
		<div class="campo">
			<label for="faixa_ate">Faixa salarial até: </label>
			<input type="number" name="faixa_ate" id="faixa_ate">
		</div>
		<div class="campo checkbox">
			<label for="pausar_vaga">Pausar vaga? </label>
			<input type="checkbox" name="pausar_vaga" id="pausar_vaga">
		</div>
		<div class="campo checkbox">
			<label for="combinar_salario">Salário à combinar? </label>
			<input type="checkbox" name="combinar_salario" id="combinar_salario">
		</div>
		<div class="campo">
			<label for="tipo_emprego">Tipo de emprego: </label>
			<select name="tipo_emprego" id="tipo_emprego">
				<option value="lorem">Lorem</option>
				<option value="lorem2">Lorem</option>
				<option value="lorem3">Lorem</option>
			</select>
		</div>
		<div class="campo">
			<label for="numero_de_vagas">Número de vagas </label>
			<input type="text" name="numero_de_vagas" id="numero_de_vagas">
		</div>
		<div class="campo full">
			<label for="descricao_vaga">Descrição da vaga</label>
			<textarea name="descricao_vaga"></textarea>
		</div>

		<h3>Endereço</h3>

		<div class="campo full">
			<label for="cep">CEP</label>
			<input type="text" name="cep">
		</div>

		<div class="campo">
			<label for="rua">Rua</label>
			<input type="text" name="rua">
		</div>

		<div class="campo">
			<label for="numero">Número</label>
			<input type="text" name="numero">
		</div>

		<div class="campo">
			<label for="complemento">Complemento</label>
			<input type="text" name="complemento">
		</div>

		<div class="campo">
			<label for="bairro">Bairro</label>
			<input type="text" name="bairro">
		</div>

		<div class="campo">
			<label for="cidade">Cidade</label>
			<input type="text" name="cidade">
		</div>

		<div class="campo">
			<label for="estado">Estado</label>
			<input type="text" name="estado">
		</div>

		<div class="area-botao">
			<div class="campo">
				<input type="submit" value="Adicionar">
			</div>
		</div>
	</form>
</div>