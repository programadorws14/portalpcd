<form action="{{ route('empresa.store.perfil') }}" class="dados" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="id" value="{{ Auth::guard('empresa')->user()->id }}">
	<div class="campo">
		<label for="nome">Nome</label>
		<input type="text" name="nome" id="dados" value="{{ ( Auth::guard('empresa')->user()->nome ? Auth::guard('empresa')->user()->nome  : old('nome'))  }}" required>
	</div>

	<div class="campo">
		<label for="cnpj">CNPJ</label>
		<input type="text" class="cnpj" name="cnpj" value="{{ ( Auth::guard('empresa')->user()->cnpj ? Auth::guard('empresa')->user()->cnpj  : old('cnpj'))  }}">
	</div>

	<div class="campo">
		<label for="email">E-mail <small style="font-size:10px; color:red; display:none;" id="msgErroEmail"></small></label>
		<input type="email" name="email" id="emailPerfil" value="{{ ( Auth::guard('empresa')->user()->email ? Auth::guard('empresa')->user()->email  : old('email'))  }}" required>
	</div>

	<div class="campo">
		<label for="telefone">Telefone da Empresa</label>
		<input type="text" name="telefone" class="telefone" value="{{ ( Auth::guard('empresa')->user()->telefone ? Auth::guard('empresa')->user()->telefone : old('telefone'))  }}" >
	</div>

	<div class="campo">
		<label for="ramo">Ramo de Atuação</label>
		<select name="ramo_atuacao" id="ramo">
		<option value="">Selecione o ramo</option>
			@if(count($ramos) >= 1)
			@foreach($ramos as $ramo)
			<option @if(Auth::guard('empresa')->user()->ramo_atuacao == $ramo->id) selected @endif value="{{ $ramo->id }}">{{ $ramo->descricao ?? null }}</option>
			@endforeach
			@endif
			<option value="outros">Outros</option>
		</select>
	</div>

	<div class="campo">
		<label for="ramo_outros">Outro ramo de atuação...</label>
		<input type="text" name="ramo_outros" disabled>
	</div>

	<div class="campo">
		<label for="tamanho_empresa">Tamanho da Empresa</label>
		<select name="tamanho_empresa">
			<option @if(!empty(Auth::guard('empresa')->user()->tamanho_empresa) && Auth::guard('empresa')->user()->tamanho_empresa == '1_10') selected @elseif(old('tamanho_empresa') == '1_10')selected @endif value="1_10">0-10</option>
			<option @if(!empty(Auth::guard('empresa')->user()->tamanho_empresa) && Auth::guard('empresa')->user()->tamanho_empresa == '11_50') selected @elseif(old('tamanho_empresa') == '11_50')selected @endif value="11_50">11-50</option>
			<option @if(!empty(Auth::guard('empresa')->user()->tamanho_empresa) && Auth::guard('empresa')->user()->tamanho_empresa == '51_100') selected @elseif(old('tamanho_empresa') == '51_100')selected @endif value="51_100">51-100</option>
		</select>
	</div>

	<div class="campo">
		<label for="data_fundacao">Data da Fundação</label>
		<input type="date" name="data_fundacao" value="{{ ( Auth::guard('empresa')->user()->data_fundacao ? date('Y-m-d', strtotime(Auth::guard('empresa')->user()->data_fundacao))  : old('data_fundacao'))  }}">
	</div>


	<div class="campo">
		<label for="especialidades">Especialidades</label>
		<input type="text" name="especialidades" placeholder="Ex: Especialidade 1, Especialidade 2" value="{{ ( Auth::guard('empresa')->user()->especialidades ? Auth::guard('empresa')->user()->especialidades : old('especialidades'))  }}">
	</div>

	<div class="campo">
		<label for="estado_empresa">Tipo de Empresa</label>
		<select name="estado_empresa">
			<option @if(!empty(Auth::guard('empresa')->user()->estado_empresa) && Auth::guard('empresa')->user()->estado_empresa == 'privada') selected @elseif(old('estado_empresa') == 'privada')selected @endif value="privada">Privada</option>
			<option @if(!empty(Auth::guard('empresa')->user()->estado_empresa) && Auth::guard('empresa')->user()->estado_empresa == 'publica') selected @elseif(old('estado_empresa') == 'publica')selected @endif value="publica">Pública</option>

		</select>
	</div>

	<div class="campo">
		<label for="url_site">Site da Empresa</label>
		<input type="text" name="site_empresa" value="{{ ( Auth::guard('empresa')->user()->site_empresa ? Auth::guard('empresa')->user()->site_empresa : old('site_empresa'))  }}">
	</div>

	<div class="campo">
		<label for="site_empresa">Seu Link Portal PCD</label>
		<input type="text" name="nome_url" value="{{ ( Auth::guard('empresa')->user()->nome_url ? Auth::guard('empresa')->user()->nome_url : old('nome_url'))  }}" disabled>
	</div>

	<div class="campo">
		<label for="senha">Senha de acesso</label>
		<input type="password" name="password">
	</div>

	<div class="campo">
		<label for="logo_empresa">Logo da Empresa</label>
		<input type="file" name="logo_empresa">
	</div>

	<div class="campo full">
		<label for="descricao_empresa">Descrição da empresa</label>
		<textarea name="descricao">{{ ( Auth::guard('empresa')->user()->descricao ? Auth::guard('empresa')->user()->descricao : old('descricao'))  }}</textarea>
	</div>

	<div class="links_social">
		<label for="links_social">Link de rede social</label>
		<div class="link">
			<input type="text" name="links_social[]">
			<div class="more-link">+</div>
		</div>
	</div>

	@if(!empty($links))
	@foreach($links as $link)
	<div class="links_social" id="{{ $link->id }}">
		<div class="link">
			<input type="text" value="{{ $link->link }}" disabled>
			<div class="">
				<button type="button" onclick="delLinks({{ $link->id }})" style="text-decoration:none; background: #e74c3c; width: 40px; height: 40px; border-radius: 50%; color: #fff; font-weight: bold; font-size: 24px; display: flex; justify-content: center; align-items: center; cursor: pointer;">x</button>
			</div>
		</div>
	</div> @endforeach
	@endif <h3>Endereço</h3>

	<div class="campo full">
		<label for="cep">CEP</label>
		<input type="text" class="cep" maxlength="8" name="cep" id="cep" value="{{ ( Auth::guard('empresa')->user()->cep ? Auth::guard('empresa')->user()->cep : old('cep'))  }}" required>
	</div>

	<div class="campo">
		<label for="rua">Rua</label>
		<input type="text" name="rua" id="rua" value="{{ ( Auth::guard('empresa')->user()->rua ? Auth::guard('empresa')->user()->rua : old('rua'))  }}" required>
	</div>

	<div class="campo">
		<label for="numero">Número</label>
		<input type="text" name="numero" value="{{ ( Auth::guard('empresa')->user()->numero ? Auth::guard('empresa')->user()->numero : old('numero'))  }}" required>
	</div>

	<div class="campo">
		<label for="complemento">Complemento</label>
		<input type="text" name="complemento" id="complemento" value="{{ ( Auth::guard('empresa')->user()->complemento ? Auth::guard('empresa')->user()->complemento : old('complemento'))  }}">
	</div>

	<div class="campo">
		<label for="bairro">Bairro</label>
		<input type="text" name="bairro" id="bairro" value="{{ ( Auth::guard('empresa')->user()->bairro ? Auth::guard('empresa')->user()->bairro : old('bairro'))  }}" required>
	</div>

	<div class="campo">
		<label for="cidade">Cidade</label>
		<input type="text" name="cidade" id="cidade" value="{{ ( Auth::guard('empresa')->user()->cidade ? Auth::guard('empresa')->user()->cidade : old('cidade')) }}" required>
	</div>

	<div class="campo">
		<label for="estado">Estado</label>
		<input type="text" name="estado" id="estado" value="{{ ( Auth::guard('empresa')->user()->estado ? Auth::guard('empresa')->user()->estado : old('estado')) }}" required>
	</div>

	<div class="area-botao">
		<div class="campo">
			<input type="submit" id="atualizar-perfil-empresa" value="Atualizar" id="atualizarPerfil">
		</div>
	</div>
</form>