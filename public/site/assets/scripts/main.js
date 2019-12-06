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
		$('#shadow').fadeIn();
		$('.modal-' + openModal).fadeIn();
	});

	$('#shadow, .modal-new .close').click(function () {
		console.log('teste');
		$('#shadow').fadeOut();
		$('.modal-new').fadeOut();
	});
});





