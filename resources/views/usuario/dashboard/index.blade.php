@extends('layouts.app')

@section('content')
<header class="section-heading pcd-container">
	<h1>Seu <strong>perfil</strong></h1>
	<hr />
</header>

<div class="wrapper container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-3 profile__info">
			@if(!empty(Auth::guard('usuario')->user()->foto))
			<img src="{{ asset(Auth::guard('usuario')->user()->foto) }}" width="191" height="191" style="border-radius:100%;" alt="" />
			@else
			<img src="{{ asset('site/assets/images/profile-image.png') }}" alt="" />
			@endif
			<h2 class="profile__title">{{ Auth::guard('usuario')->user()->nome ?? null }}</h2>
			{{-- <p class="profile__username">@Loremipsum</p> --}}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-12">
			<section class="profile">
				<div class="profile__card">
					<section class="profile__section">
						<h2>
							Vagas Cadastradas <i class="fas fa-chevron-down"></i>
						</h2>
						<ul>
							<li>Marketing</li>
							<li>Mídias Digitais</li>
							<li>Coordenador MKT</li>
						</ul>
					</section>
					{{-- <section class="profile__section">
						<h2>
							Preenchimento do Currículo <i class="fas fa-chevron-down"></i>
						</h2>
						<div>
							<p class="profile__fill">
								Ótimo
							</p>
							<p>
								Só faltam algumas informações para ter um Currículo
								completo!
							</p>

							<div class="progress-bar">
								<div class="progress-bar__amount">80%</div>
								<div class="progress-bar__percentage"></div>
							</div>
						</div>
					</section> --}}
					<button class="update-resume" id="atualizar-cv" style="margin-top:40px;">
						<i class="fas fa-pencil-alt"></i> Atualizar Currículo
					</button>
				</div>
			</section>
			
			<div style="margin:30px auto; text-align:center;">
				@if(is_null(Auth::guard('usuario')->user()->status_laudo))
					<span style="border-radius:10px; background:orange; font-size:13px; font-weight:bold; color:#FFF; padding:5px;">Laudo em Analise</span>
				@elseif(Auth::guard('usuario')->user()->status_laudo == 1)
					<span style="border-radius:10px; background:green; font-size:13px; font-weight:bold; color:#FFF; padding:5px;">Laudo Aprovado</span>
				@else
					<span style="border-radius:10px; background:red; font-size:13px; font-weight:bold; color:#FFF; padding:5px;">Laudo Reprovado</span>
				@endif

				@if(!is_null(Auth::guard('usuario')->user()->cv))
					<a href="{{ asset(Auth::guard('usuario')->user()->cv) }}" style="text-decoration:none;" download="download"><span style="border-radius:10px; background:#069; font-size:13px; font-weight:bold; color:#FFF; padding:5px;">Ver CV</span></a>
				@endif
				
				
			</div>
		</div>
		<div class="col-md-8 col-md-offset-1 col-xs-12">
			<section class="dashboard-dados negative">
				<div class="abas-area">
					<a class="aba active" data-open="vagas" id="aba-vagas">Minhas candidaturas</a>
					<a class="aba" data-open="meus-dados" id="aba-meus-dados">Meus dados</a>
				</div>
				<div class="content-aba">

					@if(Session('success'))
					<div class="alert alert-success" style="margin:20px 0; color:green;">
						<b><i class="fas fa-check"></i> {{ Session('success') }}</b>
					</div>
					@elseif(Session('error'))
					<div class="alert alert-danger" style="margin:20px 0; color:red;">
						<b><i class="fas fa-times-circle"></i> {{ Session('error') }}</b>
					</div>
					@endif

					<div class="content vagas active" id="minhas-candidaturas">
						<ul>
							@if(count($candidaturas) >= 1)
								@foreach ($candidaturas as $candidatura)
									<li>
										<div class="infos-vaga">
											<span class="nome-vaga">{{ $candidatura->vaga->titulo ?? 'Não Informado' }}</span>
											@if($candidatura->vaga->pausar_vaga == '')
												<span class="ativa">Ativa</span>
											@else
												<span class="pausada">Pausada</span>
											@endif
										</div>
										<a href="{{ route('usuario.cancelar-candidatura.vaga', $candidatura->id) }}" class="cta cancelar-candidatura">Abandonar vaga</a>
										<a href="{{ route('site.vagas.show', $candidatura->vaga->id) }}" target="_blank" class="cta ver-vaga">Visualizar vaga</a>
									</li>
								@endforeach
							@else
								<span style="background:#0086a5; margin-top:15px; color:#FFF; padding:5px; border-radius:10px;"><b>Não há candidaturas!</b></span>
							@endif

						</ul>
					</div>

					<div class="content meus-dados" id="meus-dados">

						<form action="{{ route('usuario.store.perfil') }}" method="POST" enctype="multipart/form-data" class="dados">
							@csrf
							<div class="campo">
								<label for="nome">Nome</label>
								<input type="text" name="nome" id="dados" value="{{ Auth::guard('usuario')->user()->nome ?? null }}">
							</div>

							<div class="campo">
								<label for="senha">Senha de acesso</label>
								<input type="password" name="password">
							</div>

							<div class="campo">
								<label for="email">E-mail <small style="font-size:12px; color:red; display:none;" id="msgErroEmail"></small></label> </label>
								<input type="email" id="emailPerfil" name="email" value="{{ Auth::guard('usuario')->user()->email ?? null }}" required>
							</div>

							<div class="campo">
								<label for="data_nascimento">Data de Nascimento</label>
								<input type="date" name="data_nascimento" value="{{ Auth::guard('usuario')->user()->data_nascimento ?? null }}">
							</div>

							<div class="campo">
								<label for="sexo">Sexo</label>
								<select name="sexo" id="sexo">
									<option @if(Auth::guard('usuario')->user()->sexo == 'Masculino') selected @endif value="Masculino">Masculino</option>
									<option @if(Auth::guard('usuario')->user()->sexo == 'Feminino') selected @endif value="Feminino">Feminino</option>
								</select>
							</div>

							<div class="campo">
								<label for="cpf">CPF</label>
								<input type="text" name="cpf" class="cpf" value="{{ Auth::guard('usuario')->user()->cpf ?? null }}">
							</div>

							<div class="campo full">
								<label for="texto_sobre_voce">Texto sobre você (Resumo)</label>
								<textarea name="texto_sobre_voce">{{ Auth::guard('usuario')->user()->texto_sobre_voce ?? null }}</textarea>
							</div>

							<div class="campo">
								<label for="telefone_residencial">Telefone Residencial</label>
								<input type="text" name="telefone_residencial" class="telefone" value="{{ Auth::guard('usuario')->user()->telefone_residencial ?? null }}">
							</div>

							<div class="campo">
								<label for="telefone_comercial">Telefone Comercial</label>
								<input type="text" name="telefone_comercial" class="telefone" value="{{ Auth::guard('usuario')->user()->telefone_comercial ?? null }}">
							</div>

							<div class="campo">
								<label for="telefone_celular">Telefone Celular</label>
								<input type="text" name="telefone_celular" class="celular" value="{{ Auth::guard('usuario')->user()->telefone_celular ?? null }}">
							</div>

							<div class="campo">
								<label for="foto">Foto</label>
								<input type="file" name="foto">
							</div>

							<div class="links_social">
								<label for="links_social">Link de rede social</label>
								<div class="link">
									<input type="text" name="links_social[]">
									<div class="more-link">+</div>
								</div>
							</div>

							<div class="campo">
								<label for="cv">Curriculum (PDF, DOC, TXT)</label>
								<input type="file" name="cv">
							</div>

							<div class="campo">
								<label for="laudo">Laudo (PDF, DOC, TXT)</label>
								<input type="file" name="laudo">
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
							</div>
							@endforeach
							@endif

							<h3>Endereço</h3>

							<div class="campo full">
								<label for="cep">CEP</label>
								<input type="text" name="cep" value="{{ Auth::guard('usuario')->user()->cep ?? null }}">
							</div>

							<div class="campo">
								<label for="rua">Rua</label>
								<input type="text" name="rua" value="{{ Auth::guard('usuario')->user()->rua ?? null }}">
							</div>

							<div class="campo">
								<label for="numero">Número</label>
								<input type="text" name="numero" value="{{ Auth::guard('usuario')->user()->numero ?? null }}">
							</div>

							<div class="campo">
								<label for="complemento">Complemento</label>
								<input type="text" name="complemento" value="{{ Auth::guard('usuario')->user()->complemento ?? null }}">
							</div>

							<div class="campo">
								<label for="bairro">Bairro</label>
								<input type="text" name="bairro" value="{{ Auth::guard('usuario')->user()->bairro ?? null }}">
							</div>

							<div class="campo">
								<label for="cidade">Cidade</label>
								<input type="text" name="cidade" value="{{ Auth::guard('usuario')->user()->cidade ?? null }}">
							</div>

							<div class="campo">
								<label for="estado">Estado</label>
								<input type="text" name="estado" value="{{ Auth::guard('usuario')->user()->estado ?? null }}">
							</div>

							<div class="area-botao">
								<div class="campo">
									<input type="submit" value="Atualizar">
								</div>
							</div>
						</form>

						<div class="block experiencia">
							<h3 class="title-content">Experiência</h3>
							<div class="list-items">
								<ul>
									@if (count($experiencias) >= 1)
									@foreach ($experiencias as $ex)
									<li>
										<div class="infos">
											<span class="edit" data-modal="edit-experiencia" onclick="editar_experiencia({{ $ex->id }})"><i class="fas fa-edit"></i></span>
											<span class="cargo">{{ $ex->cargo ?? null }}</span>
											<span class="empresa">{{ $ex->nome_empresa ?? null }}</span>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
								<div class="area-botao">
									<button id="new" data-modal="nova-experiencia">Adicionar experiência</button>
								</div>
								@include('usuario.dashboard.modal_nova_experiencia')
								@include('usuario.dashboard.modal_nova_experiencia_edit')
							</div>
						</div>

						<div class="block formacao">
							<h3 class="title-content">Formação</h3>
							<div class="list-items">
								<ul>
									@if (count($formacoes) >= 1)
									@foreach ($formacoes as $formacao)
									<li>
										<div class="infos">
											<span class="edit" data-modal="edit-formacao" onclick="editar_formacao({{ $formacao->id }})"><i class="fas fa-edit"></i></span>
											<span class="formacao">{{ $formacao->formacao ?? null }}</span>
											<span class="instituicao">{{ $formacao->nome_instituicao ?? null }}</span>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
								<div class="area-botao">
									<button id="new" data-modal="nova-formacao">Adicionar formação</button>
								</div>
								@include('usuario.dashboard.modal_nova_formacao')
								@include('usuario.dashboard.modal_nova_formacao_edit')
							</div>
						</div>

						<div class="block voluntario">
							<h3 class="title-content">Voluntário</h3>
							<div class="list-items">
								<ul>
									@if (count($voluntarios) >= 1)
									@foreach ($voluntarios as $voluntario)
									<li>
										<div class="infos">
											<span class="edit" data-modal="edit-voluntario" onclick="editar_voluntario({{ $voluntario->id }})"><i class="fas fa-edit"></i></span>
											<span class="formacao">{{ $voluntario->cargo_voluntario ?? null }}</span>
											<span class="instituicao">{{ $voluntario->nome_instituicao_voluntario ?? null }}</span>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
								<div class="area-botao">
									<button id="new" data-modal="nova-voluntario">Adicionar Voluntariado</button>
								</div>
								@include('usuario.dashboard.modal_nova_voluntario')
								@include('usuario.dashboard.modal_nova_voluntario_edit')
							</div>
						</div>
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
	function editar_experiencia(id) {
		if (id != '') {
			$.get(route('usuario.get.experiencia', id), function(data) {
				if (data.length >= 1) {
					$("#id").val(data[0].id);
					$("#nome_empresa").val(data[0].nome_empresa);
					$("#cargo").val(data[0].cargo);
					$("#data_inicio").val(data[0].data_inicio);
					$("#data_termino").val(data[0].data_termino);
					$("#cidade").val(data[0].cidade);
					$("#descricao").val(data[0].descricao);
				}
			});
		}
	}

	function editar_formacao(id) {
		if (id != '') {
			$.get(route('usuario.get.formacao', id), function(data) {
				if (data.length >= 1) {
					$("#id_formacao").val(data[0].id);
					$("#nome_instituicao_formacao").val(data[0].nome_instituicao);
					$("#formacao").val(data[0].formacao);
					$("#data_inicio_formacao").val(data[0].data_inicio);
					$("#data_termino_formacao").val(data[0].data_termino);
					$("#descricao_formacao").val(data[0].descricao_formacao);
					$("#recomendacoes_premiacoes").val(data[0].recomendacoes_premiacoes);
				}
			});
		}
	}

	function editar_voluntario(id) {
		if (id != '') {
			$.get(route('usuario.get.voluntario', id), function(data) {
				if (data.length >= 1) {
					$("#id_voluntario").val(data[0].id);
					$("#nome_instituicao_voluntario").val(data[0].nome_instituicao_voluntario);
					$("#cargo_voluntario").val(data[0].cargo_voluntario);
					$("#data_inicio_voluntario").val(data[0].data_inicio);
					$("#data_termino_voluntario").val(data[0].data_termino);
					$("#recomendacoes_premiacoes_voluntario").val(data[0].recomendacoes_premiacoes);
					$("#descricao_voluntario").val(data[0].descricao_voluntario);
				}
			});
		}
	}

	$("#emailPerfil").change(function() {
		var email = $("#emailPerfil").val();
		if (email != '') {
			$.get(route('usuario.verifica.email', email), function(data) {
				if (data.status == 'sucesso') {
					$("#emailPerfil").css('border', '1px solid red')
					$("#msgErroEmail").html('E-mail já existe, tente outro').fadeIn('slow');
					$("#atualizarPerfil").prop('disabled', true);
				} else {
					$("#emailPerfil").css('border', '1px solid #eeeeee')
					$("#msgErroEmail").fadeOut('slow');
					$("#atualizarPerfil").prop('disabled', false);
				}
			});
		}
	});

	function delLinks(id) {
		$.get(route('usuario.delLinks', id), function(data) {
			if (data.status == 'success') {
				$("#" + id).hide();
			}
		});
	}

	$(function() {
		$("#atualizar-cv").click(function() {
			$("#aba-vagas").removeClass('active');
			$("#aba-meus-dados").addClass('active');

			$("#minhas-candidaturas").removeClass('active');
			$("#meus-dados").addClass('active');
		});
	});
</script>
@endsection