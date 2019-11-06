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
	$('.dashboard-dados-vagas .abas-area .aba').click(function () {
		$('.dashboard-dados-vagas .abas-area .aba').removeClass('active');
		$(this).addClass('active');

		let open = $(this).attr('data-open');

		$('.dashboard-dados-vagas .content-aba .content').fadeOut(400);

		setTimeout(() => {
			$('.dashboard-dados-vagas .content-aba .content.' + open).fadeIn(400);
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
		if(ramo == "outros"){
			$('.dados input[name=ramo_outros]').prop("disabled", false);
		} else{
			$('.dados input[name=ramo_outros]').prop("disabled", true);
		}
	});
});