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
			<h2 class="profile__title">Lorem Ipsum sit dolor amet</h2>
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
					<section class="profile__section">
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
					</section>
					<button class="update-resume">
						<i class="fas fa-pencil-alt"></i> Atualizar Currículo
					</button>
				</div>
			</section>
		</div>
		<div class="col-md-8 col-md-offset-1 col-xs-12">
			<section class="dashboard-dados negative">
				<div class="abas-area">
					<a class="aba active" data-open="vagas">Minhas candidaturas</a>
					<a class="aba" data-open="meus-dados">Meus dados</a>
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

					<div class="content vagas active">
						<ul>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="ativa">Ativa</span>
								</div>
								<a href="#" class="cta cancelar-candidatura">Abandonar vaga</a>
								<a href="#" class="cta ver-vaga">Visualizar vaga</a>
							</li>
							<li>
								<div class="infos-vaga">
									<span class="nome-vaga">Analista de Sistemas</span>
									<span class="encerrada">Encerrada</span>
								</div>
								<a href="#" class="cta ver-vaga">Visualizar vaga</a>
							</li>
						</ul>
					</div>

					<div class="content meus-dados">
						
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
								<input type="text" name="telefone_celular" class="telefone" value="{{ Auth::guard('usuario')->user()->telefone_celular ?? null }}" >
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
								<input type="text" name="cep"  value="{{ Auth::guard('usuario')->user()->cep ?? null }}" >
							</div>

							<div class="campo">
								<label for="rua">Rua</label>
								<input type="text" name="rua"  value="{{ Auth::guard('usuario')->user()->rua ?? null }}">
							</div>

							<div class="campo">
								<label for="numero">Número</label>
								<input type="text" name="numero"  value="{{ Auth::guard('usuario')->user()->numero ?? null }}">
							</div>

							<div class="campo">
								<label for="complemento">Complemento</label>
								<input type="text" name="complemento"  value="{{ Auth::guard('usuario')->user()->complemento ?? null }}">
							</div>

							<div class="campo">
								<label for="bairro">Bairro</label>
								<input type="text" name="bairro"  value="{{ Auth::guard('usuario')->user()->bairro ?? null }}">
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
												<span class="edit" data-modal="nova-experiencia"><i class="fas fa-edit"></i></span>
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
											<span class="edit" data-modal="nova-experiencia"><i class="fas fa-edit"></i></span>
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
											<span class="edit" data-modal="nova-experiencia"><i class="fas fa-edit"></i></span>
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

	</script>
@endsection
