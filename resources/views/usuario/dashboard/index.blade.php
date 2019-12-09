@extends('layouts.app')

@section('content')
<header class="section-heading pcd-container">
	<h1>Seu <strong>perfil</strong></h1>
	<hr />
</header>

<div class="wrapper container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-3 profile__info">
			<img src="{{ asset('site/assets/images/profile-image.png') }}" alt="" />
			<h2 class="profile__title">Lorem Ipsum sit dolor amet</h2>
			<p class="profile__username">@Loremipsum</p>
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
						<form action="#" class="dados">
							<div class="campo">
								<label for="nome">Nome</label>
								<input type="text" name="nome" id="dados" value="{{ Auth::guard('usuario')->user()->nome ?? null }}">
							</div>

							<div class="campo">
								<label for="senha">Senha de acesso</label>
								<input type="password" name="senha">
							</div>

							<div class="campo">
								<label for="email">E-mail</label>

								<input type="email" name="email" value="{{ Auth::guard('usuario')->user()->email ?? null }}">
							</div>

							<div class="campo">
								<label for="data_nasc">Data de Nascimento</label>
								<input type="date" name="data_nascimento " value="{{ Auth::guard('usuario')->user()->data_nascimento ?? null }}">
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
								<input type="text" name="cpf" value="{{ Auth::guard('usuario')->user()->cpf ?? null }}">
							</div>

							<div class="campo full">
								<label for="descricao_candidato">Texto sobre você (Resumo)</label>
								<textarea name="texto_sobre_voce">{{ Auth::guard('usuario')->user()->texto_sobre_voce ?? null }}</textarea>
							</div>

							<div class="campo">
								<label for="telefone_residencial">Telefone Residencial</label>
								<input type="text" name="telefone_residencial" value="{{ Auth::guard('usuario')->user()->telefone_residencial ?? null }}">
							</div>

							<div class="campo">
								<label for="telefone_comercial">Telefone Comercial</label>
								<input type="text" name="telefone_comercial" value="{{ Auth::guard('usuario')->user()->telefone_comercial ?? null }}">
							</div>

							<div class="campo">
								<label for="telefone_celular">Telefone Celular</label>
								<input type="text" name="telefone_celular" value="{{ Auth::guard('usuario')->user()->telefone_celular ?? null }}" >
							</div>

							<div class="campo">
								<label for="foto">Foto</label>
								<input type="file" name="foto">
							</div>

							<div class="links_social">
								<label for="links_social">Link de rede social</label>
								<div class="link">
									<input type="text" name="links_social">
									<div class="more-link">+</div>
								</div>
							</div>

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
									<li>
										<div class="infos">
											<span class="edit" data-modal="nova-experiencia"><i class="fas fa-edit"></i></span>
											<span class="cargo">EntregadorEntregadorEntregador</span>
											<span class="empresa">Pastelaria</span>
										</div>
									</li>
								</ul>
								<div class="area-botao">
									<button id="new" data-modal="nova-experiencia">Adicionar experiência</button>
								</div>

								<div class="modal-new modal-nova-experiencia">
									<div class="close">
										<span></span>
										<span></span>
									</div>
									<form action="#" class="dados">
										<div class="header">
											<a href="#" class="delete">Excluir</a>
											<h3 class="form-title">Informações da Experiência</h3>
										</div>
										<div class="campo">
											<label for="nome_empresa">Nome Empresa</label>
											<input type="text" name="nome_empresa">
										</div>
										<div class="campo">
											<label for="cargo">Cargo</label>
											<input type="text" name="cargo">
										</div>
										<div class="campo">
											<label for="data_inicio">Data início</label>
											<input type="date" name="data_inicio">
										</div>
										<div class="campo">
											<label for="data_termino">Data término/previsão</label>
											<input type="date" name="data_termino">
										</div>
										<div class="campo">
											<label for="cidade">Cidade</label>
											<input type="text" name="cidade">
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
							</div>
						</div>

						<div class="block formacao">
							<h3 class="title-content">Formação</h3>
							<div class="list-items">
								<ul>
									<li>
										<div class="infos">
											<span class="edit" data-modal="nova-formacao"><i class="fas fa-edit"></i></span>
											<span class="formacao">Análista de dados</span>
											<span class="instituicao">USP</span>
										</div>
									</li>
								</ul>
								<div class="area-botao">
									<button id="new" data-modal="nova-formacao">Adicionar formação</button>
								</div>
								<div class="modal-new modal-nova-formacao">
									<div class="close">
										<span></span>
										<span></span>
									</div>
									<form action="#" class="dados">
										<div class="header">
											<a href="#" class="delete">Excluir</a>
											<h3 class="form-title">Informações da Formação</h3>
										</div>
										<div class="campo">
											<label for="nome_instituicao">Nome instituição</label>
											<input type="text" name="nome_instituicao">
										</div>
										<div class="campo">
											<label for="formacao">Formação</label>
											<input type="text" name="formacao">
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
											<label for="descricao_formacao">Descrição</label>
											<textarea name="descricao_formacao"></textarea>
										</div>
										<div class="campo full">
											<label for="recomendacoes_premiacoes">Recomendações ou
												premiações</label>
											<input type="text" name="recomendacoes_premiacoes">
										</div>

										<div class="area-botao">
											<div class="campo">
												<input type="submit" value="Adicionar">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="block voluntario">
							<h3 class="title-content">Voluntário</h3>
							<div class="list-items">
								<ul>
									<li>
										<div class="infos">
											<span class="edit" data-modal="nova-voluntario"><i class="fas fa-edit"></i></span>
											<span class="cargo">Entregador</span>
											<span class="instituicao">Marmitas do bem</span>
										</div>
									</li>
								</ul>
								<div class="area-botao">
									<button id="new" data-modal="nova-voluntario">Adicionar Voluntariado</button>
								</div>
								<div class="modal-new modal-nova-voluntario">
									<div class="close">
										<span></span>
										<span></span>
									</div>
									<form action="#" class="dados">
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