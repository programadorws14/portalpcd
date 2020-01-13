$(function () {
	var blogPostComponent;

	function loadComponent(fileURL, container = "#container") {
		if (!fileURL) return;

		$.get(fileURL, function (data) {
			$(container).append(data);
		});

		// $(container).load(fileURL);
	}

	function loadBlogPostComponent() {
		loadComponent("./../../src/components/blog-post/blog-post.html");
	}

	function loadSectionHeadingComponent() {
		loadComponent(
			"./../../src/components/section-heading/section-heading.html"
		);
	}

	function loadMainNavigationComponent() {
		loadComponent(
			"./../../src/components/main-navigation/main-navigation.html",
			"#mainNav"
		);
	}

	function loadJobsOpeningComponent() {
		loadComponent("./../../src/components/jobs-card/jobs-card.html");
	}

	function loadJobsSearch() {
		loadComponent(
			"./../../src/components/jobs-search-form/jobs-search-form.html"
		);
	}

	function loadNewsletter() {
		loadComponent("/../../src/pages/category.html");
	}

	function init() {
		// loadMainNavigationComponent();
		// loadJobsSearch();
		// loadBlogPostComponent();
		// loadSectionHeadingComponent();
		// loadJobsOpeningComponent();
		// loadNewsletter();
	}

	init();

	$(".search-filter__title, .profile__section h2, .dashboard h3").on(
		"click",
		function () {
			$(this)
				.siblings()
				.slideToggle(300);
		}
	);
});

// Abas da página empresa
$(document).ready(function () {
	$('.dashboard-dados-vagas .abas-area .aba, .dashboard-dados .abas-area .aba').click(function () {
		$('.dashboard-dados-vagas .abas-area .aba, .dashboard-dados .abas-area .aba').removeClass('active');
		$(this).addClass('active');

		let open = $(this).attr('data-open');

		$('.dashboard-dados-vagas .content-aba .content, .dashboard-dados .content-aba .content').fadeOut(400);

		setTimeout(() => {
			$('.dashboard-dados-vagas .content-aba .content.' + open + ', .dashboard-dados .content-aba .content.' + open).fadeIn(400);
		}, 400);
	})
});


// Adicionar novos input de link social
$(document).on('click', '.meus-dados .links_social .more-link', function () {
	if ($(this).hasClass('remove')) {
		$(this).parent().remove();
	} else {
		$(this).parent().parent().append('<div class="link"><input type="text" name="links_social[]"><div class="more-link">+</div></div>');
	}
	$(this).addClass('remove');
	$(this).text('x');
})

// Validar se o "select" de ramo está com outros
$(document).ready(function () {
	$('.dados #ramo').change(function () {
		let ramo = $(this).val();
		if (ramo == "outros") {
			$('.dados input[name=ramo_outros]').prop("disabled", false);
		} else {
			$('.dados input[name=ramo_outros]').prop("disabled", true);
		}
	});
});

// Modal adicionar nova vaga / Alterar vaga
$(document).ready(function () {
	$('#nova-vaga').click(function () {
		document.getElementById('form-nova-vaga').reset();
		$('#shadow').fadeIn();
		$('.modal-nova-vaga').fadeIn();
	});

	$('#shadow, .close-nova-vaga').click(function () {
		$('#shadow').fadeOut();
		$('.modal-nova-vaga').fadeOut();
	});


	$("#salario_acombinar_vaga").click(function () {
		if ($("#salario_acombinar_vaga").is(':checked')) {
			$("#salario_de_vaga").empty();
			$("#salario_ate_vaga").empty();

			$("#salario_de_vaga").prop('disabled', true);
			$("#salario_ate_vaga").prop('disabled', true);

		} else {
			$("#salario_de_vaga").prop('disabled', false);
			$("#salario_ate_vaga").prop('disabled', false);
		}
	});
});

function modal_edit(id) {
	var id = id;
	document.getElementById('form-edit-vaga').reset();
	$("#excluir_vaga").prop("href", route('empresa.vaga.delete', id))
	if (id != '') {
		$.get(route('empresa.vaga.edit', id), function (data) {
			if (data.status == 'success') {
				$("#vaga_id").val(data.vaga.id);
				$("#titulo_vaga_vaga").val(data.vaga.titulo);
				$("#salario_de_vaga").val(data.vaga.salario_de);
				$("#salario_ate_vaga").val(data.vaga.salario_ate);
				if (data.vaga.pausar_vaga != '') {
					$("#pausar_vaga_vaga").prop('checked', true);
				}
				if (data.vaga.salario_acombinar != '') {
					$("#salario_acombinar_vaga").prop('checked', true);
					$("#salario_de_vaga").prop('disabled', true);
					$("#salario_ate_vaga").prop('disabled', true);
					$("#salario_de_vaga").prop('required', false);
					$("#salario_ate_vaga").prop('required', false);
				} else {
					$("#salario_de_vaga").prop('disabled', false);
					$("#salario_ate_vaga").prop('disabled', false);

					$("#salario_de_vaga").prop('required', true);
					$("#salario_ate_vaga").prop('required', true);
				}

				$('#tipo_emprego_vaga option').each((indice, elementos) => {
					if (elementos.textContent == data.vaga.tipo_emprego) {
						elementos.selected = true;
					}
				});

				$("#numero_de_vagas_vaga").val(data.vaga.numero_vagas);
				$("#descricao_vaga").val(data.vaga.descricao_vaga);
				$("#cep_edit_vaga").val(data.vaga.cep);
				$("#rua_edit_vaga").val(data.vaga.rua);
				$("#numero_edit_vaga").val(data.vaga.numero);
				$("#complemento_edit_vaga").val(data.vaga.complemento);
				$("#bairro_edit_vaga").val(data.vaga.bairro);
				$("#cidade_edit_vaga").val(data.vaga.cidade);
				$("#estado_edit_vaga").val(data.vaga.estado);
			} else if (data.status == 'error') {
				console.log(data);
			}
		});
	} else {
		$("#msgerro").css('display', 'block').fadeIn('slow');
	}
	$('#shadow').fadeIn();
	$('.modal-editar').fadeIn('slow');
}

$(document).ready(function () {
	$('#shadow, .close-edit').click(function () {
		$('#shadow').fadeOut();
		$('.modal-editar').fadeOut();
	});
});

$(document).ready(function () {
	$('.dashboard-dados #new, .dashboard-dados .infos .edit').click(function () {
		let openModal = $(this).attr('data-modal');

		$('form').each(function () {
			this.reset();
		});

		$('#shadow').fadeIn();
		$('.modal-' + openModal).fadeIn();
	});

	$('#shadow, .modal-new .close').click(function () {
		$('#shadow').fadeOut();
		$('.modal-new').fadeOut();
	});
});


//Ver Mais Vagas - Botão Home Page
$(document).ready(function () {
	$('.jobs-card__see-more').click(function () {
		let divjobs = $(".jobs-card").length;
		carregarMais(divjobs);
	});
});


function carregarMais(offset) {
	$.get(route('site.home.carregar.mais', offset), function (data) {
		if (data.length > 0) {
			for (i = 0; i < data.length; i++) {
				$('.cards-vermais').append(`<div class="col-xs-12 col-md-4" style="margin-top:25px;">
				<article class="jobs-card">
					<section class="jobs-card__header">
						<div class="jobs-card__image">
							<img src="`+ (data[i].empresa.logo_empresa == '' ? '/img/img-empresa.png' : data[i].empresa.logo_empresa) + `" width="90" height="90" alt="" />
						</div>
						<div class="jobs-card__description">
							<h2 class="jobs-card__title"><a href="`+ route('site.vagas.show', data[i].id) + `">` + data[i].titulo.substr(0, 20) + `</a></h2>
							<h4 class="jobs-card__subtitle">`+ data[i].descricao_vaga.substr(0, 65) + `</h4>
						</div>
					</section>
					<footer class="jobs-card__footer">
						<p class="jobs-card__location">
							<i class="fas fa-location-arrow"></i>&nbsp; `+ data[i].cidade + ` - ` + data[i].estado + `
						</p>
						<p class="jobs-card__date">
							<i class="fas fa-calendar"></i>&nbsp; Publicado em: ` + new Date(data[i].created_at).toLocaleDateString() + `
						</p>
					</footer>
				</article>
				</div>`).hide().fadeIn('slow');
			}
		}

		if (data.length == 0) {
			$('.jobs-card__see-more').fadeOut('fast');
		}

	});
}


//Ver mais Vagas - botão na pagina todas as vagas
$(document).ready(function () {
	$('#carregarMaisVagas').click(function () {
		var div = $(".openings-card").length;
		CarrMaisVagas(div);
	});
});

function CarrMaisVagas(offset) {


	$.get(route('site.home.carregar.mais.vagas', offset), function (data) {

		if (data.length > 0) {
			for (i = 0; i < data.length; i++) {
				$('.openings-card__container').append(`<article class="openings-card">
				<section class="openings-card__header">
				  <div class="openings-card__headerinfo">
					<h4 class="openings-card__subtitle">
					  <a href="`+ route('site.vagas.show', data[i].id) + `">` + data[i].empresa.nome + `</a>
					</h4>
					<h2 class="openings-card__title">
					  <a href="`+ route('site.vagas.show', data[i].id) + `">` + data[i].titulo.substr(0, 20) + `</a>
					</h2>
					<!-- <h5>Auxiliar/Operacional</h5> -->
				  </div>
				  <a href="{{ route('site.vagas.show', $vaga->id) }}" class="openings-card__openings">Cadastre-se |` + data[i].numero_vagas + `</a>
				</section>
				<section class="openings-card__description">
				  <h3>Descrição das Atividades:</h3>
				  <p>`+ data[i].descricao_vaga.substr(0, 311) + `
				  </p>
				</section>
				<footer class="openings-card__footer">
				  <p class="openings-card__location">
					<i class="fas fa-map-marker-alt"></i>&nbsp; `+ data[i].cidade + ` - ` + data[i].estado + `
				  </p>
				  <p class="openings-card__date">
					<i class="fas fa-calendar"></i>&nbsp; Publicado em: ` + new Date(data[i].created_at).toLocaleDateString() + `
				  </p>
				</footer>
			  </article>`).hide().fadeIn('slow');
			}
		}
		if (data.length == 0) {
			$('#carregarMaisVagas').fadeOut('fast');
		}
	});
}

$(document).ready(function () {
	$("input[name='estado[]']").click(function () {
		$("#form-pesquisa-filtro").submit();
	});
});


function abrir_modal_ver_candidatos(id_vaga) {

	$('#shadow').fadeIn();
	$('.modal-ver-candidato').fadeIn();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type: 'GET',
		url: (route('empresa.vaga.get', id_vaga)),
		success: function (data) {
			$("#boxCandidatosVaga").empty();
			data['candidaturas'].forEach(function (value, indice) {
				console.log(value);
				$(".boxCandVaga").append(`<div class="boxCandidatosVaga">
				<span><b><i class="fas fa-user"></i> `+ value.candidato_vaga.nome + `</b></span> | <span>` + (value.candidato_vaga.telefone_residencial ? value.candidato_vaga.telefone_residencial : 'Não Contém') + ` | ` + (value.candidato_vaga.telefone_comercial ? value.candidato_vaga.telefone_comercial : 'Não Contém') + ` | ` + (value.candidato_vaga.telefone_celular ? value.candidato_vaga.telefone_celular : 'Não Contém') + `</span> | <span>` + value.candidato_vaga.email + `</span> <a href="#" onclick="mostrarInformacoesCandidato(` + value.id + `)"  class="verMaisCandidatos" title="Veja Mais"><b class="btn-veja-mais-info-candidatos" style="padding:4px; background:#000; color:#FFF;">+</b></a>
				
				<div class="MostraInformacoes" id="toggle_`+ value.id + `" style="display:none;">
					<b>Data Nascimento:</b> ` + new Date(value.candidato_vaga.data_nascimento).toLocaleDateString() + `<br /><br />
					<b>Sexo:</b> `+ (value.candidato_vaga.sexo ? value.candidato_vaga.sexo : 'Não Contém Informação') + `<br /><br />
					<b>CPF:</b> `+ (value.candidato_vaga.cpf ? value.candidato_vaga.cpf : 'Não Contém Informação') + `<br /><br />
					<b>Sobre:</b>`+ (value.candidato_vaga.texto_sobre_voce ? value.candidato_vaga.texto_sobre_voce : 'Não Contém Informação') + `<br /><br />
					<b>Telefone Residencial:</b>  `+ (value.candidato_vaga.telefone_residencial ? value.candidato_vaga.telefone_residencial : 'Não Contém Informação') + ` |  <b>Telefone Comercial:</b>  ` + (value.candidato_vaga.telefone_comercial ? value.candidato_vaga.telefone_comercial : 'Não Contém Informação') + `  |   <b>Telefone Celular:</b>  ` + (value.candidato_vaga.telefone_celular ? value.candidato_vaga.telefone_celular : 'Não Contém Informação') + ` <br /><br />
					<b>CEP:</b> `+ (value.candidato_vaga.sexo ? value.candidato_vaga.sexo : 'Não Contém Informação') + `<br /><br />
					<b>Rua: `+ (value.candidato_vaga.rua ? value.candidato_vaga.rua : 'Não Contém Informação') + `</b>
					<b>Número:</b> `+ (value.candidato_vaga.numero ? value.candidato_vaga.numero : 'Não Contém Informação') + `  |  <b>Complemento: </b> ` + (value.candidato_vaga.complemento ? value.candidato_vaga.complemento : 'Não Contém Informação') + `
					<b>Bairro: </b> `+ (value.candidato_vaga.bairro ? value.candidato_vaga.bairro : 'Não Contém Informação') + ` | <b>Estado:</b> ` + (value.candidato_vaga.estado ? value.candidato_vaga.estado : 'Não Contém Informação') + `<br /><br />

					<h4 style="width:100%; background:#333; color:#FFF; padding:10px;"><b>Experiências</b></h4>
					<br />
					<div class="list-experiencias"></div>
				
					<br />
					<h4 style="width:100%; background:#333; color:#FFF; padding:10px;"><b>Formação</b></h4>
					<br />
					<div class="list-formacaos"></div>

					<h4 style="width:100%; background:#333; color:#FFF; padding:10px;"><b>Voluntário</b></h4>
					<br />
					<div class="list-voluntarios"></div>
				</div>
			</div>`);
			
				value.candidato_vaga.experiencias.forEach(function(valor, index){
					$('.list-experiencias').append(`
					<b>Nome Empresa:</b> `+ (valor.nome_empresa ? valor.nome_empresa : 'Não Informado') +`<br />
					<b>Cargo: </b>  `+ (valor.cargo ? valor.cargo : 'Não Informado') +`<br />
					<b>Data Início:</b>  ` + new Date(valor.data_inicio).toLocaleDateString() + `  |  <b>Data Término:</b> ` + new Date(valor.data_termino).toLocaleDateString() + ` <br />
					<b>Cidade: </b>  `+ (valor.cidade ? valor.nome_empresa : 'Não Informado') +`<br />
					<b>Descrição</b> `+ (valor.descricao ? valor.descricao : 'Não Informado') +`<br />
					<br /><br />
					<hr />
					<br /><br />
					`);
				});

				value.candidato_vaga.formacoes.forEach(function (valor, index){
					$('.list-formacaos').append(`
						<b>Nome Instituição:</b> `+ (valor.nome_instituicao ? valor.nome_instituicao : 'Não Informado') +`<br />
						<b>Formação:</b>  `+ (valor.formacao ? valor.formacao : 'Não Informado') +`	<br />
						` + new Date(valor.data_inicio).toLocaleDateString() + `  |  <b>Data Término:</b>  ` + new Date(valor.data_termino).toLocaleDateString() + ` <br />
						<b>Descrição: </b> `+ (valor.descricao_formacao ? valor.descricao_formacao : 'Não Informado') +`<br />
						<b>Recomendações: </b> `+ (valor.recomendacoes_premiacoes ? valor.recomendacoes_premiacoes : 'Não Informado') +`
						<br /><br />
						<hr />
						<br /><br />
					`);
				});

				value.candidato_vaga.voluntarios.forEach(function (voluntario, index) {
					$('.list-voluntarios').append(`
						<b>Nome Instituição:</b> `+ (voluntario.nome_instituicao_voluntario ? voluntario.nome_instituicao_voluntario : 'Não Informado') +`<br />
						<b>Cargo Voluntário:</b>  `+ (voluntario.cargo_voluntario ? voluntario.cargo_voluntario : 'Não Informado') +`	<br />
						<b>Data Início: </b>` + new Date(voluntario.data_inicio).toLocaleDateString() + `  |  <b>Data Término:</b>  ` + new Date(voluntario.data_termino).toLocaleDateString() + ` <br />
						<b>Descrição: </b> `+ (voluntario.descricao ? voluntario.descricao : 'Não Informado') +`<br />
						<b>Recomendações: </b> `+ (voluntario.recomendacoes_premiacoes ? voluntario.recomendacoes_premiacoes : 'Não Informado') +`
						<br /><br />
						<hr />
						<br /><br />
					`);
				});

			});
		},
		error: function () {
			console.log(data);
		}
	});
}


function mostrarInformacoesCandidato(id_toggle) {
	$("#toggle_" + id_toggle).toggle("slow");
}


$(document).ready(function () {
	$('#shadow, .close-modal-ver-candidatos').click(function () {
		$('#shadow').fadeOut();
		$('.modal-ver-candidato').fadeOut('fast', function () {
			$(".boxCandVaga").empty();
		});
	});
});