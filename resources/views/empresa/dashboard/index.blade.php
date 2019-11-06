@extends('layouts.app')

@section('content')


<header class="section-heading pcd-container">
	<h1>Sua <strong>Empresa</strong></h1>
	<hr />
</header>



<div class="wrapper container-fluid">
	<div class="row">

		@include('empresa.sidebar')

		<div class="col-md-8 col-md-offset-1 col-xs-12">

			@if(Session('success'))
			<div class="alert alert-success" style="color:green; margin-bottom:20px;">
				<b><i class="fas fa-check"></i> {{ Session('success') }}</b>
			</div>
			@elseif(Session('error'))
			<div class="alert alert-danger" style="color:green; margin-bottom:20px;">
				<b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
			</div>
			@endif


			<!-- <section class="dashboard">
				<h3>Serviços <i class="fas fa-chevron-down"></i></h3>
				<div class="dashboard__card">
					<i class="fas fa-newspaper"></i>
					<div>
						<h2>Currículo</h2>
						<p>Última atualização em 15/06/2019</p>
					</div>
				</div>
				<div class="dashboard__card">
					<i class="fas fa-envelope"></i>
					<div>
						<h2>Alertas de Vagas</h2>
						<p>Receba alerta de vagas por e-mail</p>
					</div>
				</div>
				<div class="dashboard__card">
					<i class="fas fa-clipboard-list"></i>
					<div>
						<h2>Histórico</h2>
						<p>200 Candidaturas a vagas</p>
					</div>
				</div>
				<div class="dashboard__card">
					<i class="fas fa-list-alt"></i>
					<div>
						<h2>Agendamentos</h2>
						<p>Nenhum agendamento recente</p>
					</div>
				</div>
			</section> -->

			<section class="dashboard-dados-vagas">

				<div class="abas-area">
					<a class="aba active" data-open="vagas">Minhas vagas</a>
					<a class="aba" data-open="meus-dados">Meus dados</a>
				</div>
				<div class="content-aba">
					<div class="content vagas active">
						<ul>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="n-candidatos">10 candidatos</span>
									<span class="localidade">São Paulo, SP</span>
								</div>
								<a href="#" class="cta ver-candidatos">Ver candidatos</a>
							</li>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="n-candidatos">10 candidatos</span>
									<span class="localidade">São Paulo, SP</span>
								</div>
								<a href="#" class="cta ver-candidatos">Ver candidatos</a>
							</li>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="n-candidatos">10 candidatos</span>
									<span class="localidade">São Paulo, SP</span>
								</div>
								<a href="#" class="cta ver-candidatos">Ver candidatos</a>
							</li>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="n-candidatos">10 candidatos</span>
									<span class="localidade">São Paulo, SP</span>
								</div>
								<a href="#" class="cta ver-candidatos">Ver candidatos</a>
							</li>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="n-candidatos">10 candidatos</span>
									<span class="localidade">São Paulo, SP</span>
								</div>
								<a href="#" class="cta ver-candidatos">Ver candidatos</a>
							</li>
						</ul>
					</div>

					<div class="content meus-dados">

						<form action="{{ route('empresa.store.perfil') }}" class="dados" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{ Auth::guard('empresa')->user()->id }}">
							<div class="campo">
								<label for="nome">Nome</label>
								<input type="text" name="nome" id="dados" value="{{ ( Auth::guard('empresa')->user()->nome ? Auth::guard('empresa')->user()->nome  : old('nome'))  }}">
							</div>

							<div class="campo">
								<label for="cnpj">CNPJ</label>
								<input type="text" class="cnpj" name="cnpj" value="{{ ( Auth::guard('empresa')->user()->cnpj ? Auth::guard('empresa')->user()->cnpj  : old('cnpj'))  }}">
							</div>

							<div class="campo">
								<label for="email">E-mail</label>

								<input type="email" name="email" value="{{ ( Auth::guard('empresa')->user()->email ? Auth::guard('empresa')->user()->email  : old('email'))  }}">
							</div>

							<div class="campo">
								<label for="telefone">Telefone da Empresa</label>
								<input type="text" name="telefone" class="telefone" value="{{ ( Auth::guard('empresa')->user()->telefone ? Auth::guard('empresa')->user()->telefone : old('telefone'))  }}">
							</div>

							<div class="campo">
								<label for="ramo">Ramo de Atuação</label>
								<select name="ramo_atuacao" id="ramo">
									<option value="">Selecione um ramo</option>
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
								<label for="site_empresa">Nome para URL</label>
								<input type="text" name="nome_url" value="{{ ( Auth::guard('empresa')->user()->nome_url ? Auth::guard('empresa')->user()->nome_url : old('nome_url'))  }}">
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
								<input type="text" class="cep" maxlength="8" name="cep" id="cep" value="{{ ( Auth::guard('empresa')->user()->cep ? Auth::guard('empresa')->user()->cep : old('cep'))  }}">
							</div>

							<div class="campo">
								<label for="rua">Rua</label>
								<input type="text" name="rua" id="rua" value="{{ ( Auth::guard('empresa')->user()->rua ? Auth::guard('empresa')->user()->rua : old('rua'))  }}">
							</div>

							<div class="campo">
								<label for="numero">Número</label>
								<input type="text" name="numero" value="{{ ( Auth::guard('empresa')->user()->numero ? Auth::guard('empresa')->user()->numero : old('numero'))  }}">
							</div>

							<div class="campo">
								<label for="complemento">Complemento</label>
								<input type="text" name="complemento" id="complemento" value="{{ ( Auth::guard('empresa')->user()->complemento ? Auth::guard('empresa')->user()->complemento : old('complemento'))  }}">
							</div>

							<div class="campo">
								<label for="bairro">Bairro</label>
								<input type="text" name="bairro" id="bairro" value="{{ ( Auth::guard('empresa')->user()->bairro ? Auth::guard('empresa')->user()->bairro : old('bairro'))  }}">
							</div>

							<div class="campo">
								<label for="cidade">Cidade</label>
								<input type="text" name="cidade" id="cidade" value="{{ ( Auth::guard('empresa')->user()->cidade ? Auth::guard('empresa')->user()->cidade : old('cidade')) }}">
							</div>

							<div class="campo">
								<label for="estado">Estado</label>
								<input type="text" name="estado" id="estado" value="{{ ( Auth::guard('empresa')->user()->estado ? Auth::guard('empresa')->user()->estado : old('estado')) }}">
							</div>

							<div class="area-botao">
								<div class="campo">
									<input type="submit" id="atualizar-perfil-empresa" value="Atualizar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<header class="section-heading pcd-container">
	<h1>Para sua <strong>Carreira</strong></h1>
	<hr />
	<a href="#">Confira todas as notícias</a>
</header>

<section class="blog-post__container  wrapper container-fluid">
	<div class="row blog-post__row">
		<div class="col-xs-12 col-md-4">
			<article class="blog-post">
				<section class="blog-post__header">
					<div class="blog-post__image">
						<img src="{{ asset('site/assets/images/Bitmap.png') }}" alt="Imagem" />
					</div>
					<div class="blog-post__description">
						<div class="blog-post__date"><span>26 de Maio, 2019</span></div>
						<a href="#" class="blog-post__category">/categoria</a>

						<h2 class="blog-post__title">Lorem Ipsum sit dolor amet</h2>
						<p class="blog-post__excerpt">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Phasellus auctor consectetur ante, quis aliquam erat
							pellentesque ut. Pellentesque placerat porttitor lacinia.
						</p>

						<a href="#" class="blog-post__read-more">Leia Mais...</a>
					</div>
				</section>
				<section class="blog-post__comments">
					<i class="fas fa-user"></i>
					comentários
				</section>
				<footer class="blog-post__tags">
					<ul>
						<li><a href="#" class="blog-post__tag">dicas</a></li>
						<li><a href="#" class="blog-post__tag">vagas</a></li>
						<li><a href="#" class="blog-post__tag">entrevistas</a></li>
					</ul>
				</footer>
			</article>
		</div>
		<div class="col-xs-12 hide show-md col-md-4">
			<article class="blog-post">
				<section class="blog-post__header">
					<div class="blog-post__image">
						<img src="{{ asset('site/assets/images/Bitmap.png') }}" alt="Imagem" />
					</div>
					<div class="blog-post__description">
						<div class="blog-post__date"><span>26 de Maio, 2019</span></div>
						<a href="#" class="blog-post__category">/categoria</a>

						<h2 class="blog-post__title">Lorem Ipsum sit dolor amet</h2>
						<p class="blog-post__excerpt">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Phasellus auctor consectetur ante, quis aliquam erat
							pellentesque ut. Pellentesque placerat porttitor lacinia.
						</p>

						<a href="#" class="blog-post__read-more">Leia Mais...</a>
					</div>
				</section>
				<section class="blog-post__comments">
					<i class="fas fa-user"></i>
					comentários
				</section>
				<footer class="blog-post__tags">
					<ul>
						<li><a href="#" class="blog-post__tag">dicas</a></li>
						<li><a href="#" class="blog-post__tag">vagas</a></li>
						<li><a href="#" class="blog-post__tag">entrevistas</a></li>
					</ul>
				</footer>
			</article>
		</div>
		<div class="col-xs-12 hide show-md col-md-4">
			<article class="blog-post">
				<section class="blog-post__header">
					<div class="blog-post__image">
						<img src="{{ asset('site/assets/images/Bitmap.png') }}" alt="Imagem" />
					</div>
					<div class="blog-post__description">
						<div class="blog-post__date"><span>26 de Maio, 2019</span></div>
						<a href="#" class="blog-post__category">/categoria</a>

						<h2 class="blog-post__title">Lorem Ipsum sit dolor amet</h2>
						<p class="blog-post__excerpt">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Phasellus auctor consectetur ante, quis aliquam erat
							pellentesque ut. Pellentesque placerat porttitor lacinia.
						</p>

						<a href="#" class="blog-post__read-more">Leia Mais...</a>
					</div>
				</section>
				<section class="blog-post__comments">
					<i class="fas fa-user"></i>
					comentários
				</section>
				<footer class="blog-post__tags">
					<ul>
						<li><a href="#" class="blog-post__tag">dicas</a></li>
						<li><a href="#" class="blog-post__tag">vagas</a></li>
						<li><a href="#" class="blog-post__tag">entrevistas</a></li>
					</ul>
				</footer>
			</article>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	$("#cep").change(function() {
		var cep = $("#cep").val();
		if (cep != '') {
			$.get('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
				if (data != '') {
					$("#rua").val(data['logradouro']);
					$("#complemento").val(data['complemento']);
					$("#cidade").val(data['localidade']);
					$("#bairro").val(data['bairro']);
					$("#estado").val(data['uf']);
				} else {
					$("#rua").val('');
					$("#complemento").val('');
					$("#cidade").val('');
					$("#bairro").val('');
					$("#estado").val('');
				}
			});
		} else {
			$("#rua").val('');
			$("#complemento").val('');
			$("#cidade").val('');
			$("#bairro").val('');
			$("#estado").val('');
		}
	});

	function delLinks(id) {
		$.get('/empresa/dashboard/delLinks/' + id, function(data) {
			if (data.status == 'success') {
				$("#" + id).hide();
			}
		});
	}
</script>
@endsection