@extends('layouts.app')

@section('content')

<header class="section-heading pcd-container">
	<h1>Sua <strong>Empresa</strong></h1>
	<hr />
</header>

<div class="wrapper container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-3 profile__info">
			@if(!empty(Auth::guard('empresa')->user()->logo_empresa))
			<img src="{{ asset(Auth::guard('empresa')->user()->logo_empresa) }}" width="191" height="191" style="border-radius:100%;" alt="" />
			@else
			<img src="{{ asset('site/assets/images/profile-image.png') }}" alt="" />
			@endif
			<h2 class="profile__title">{{ Auth::guard('empresa')->user()->nome ?? null }} </h2>
			<p></p>
			<p class="profile__username">{{ '@'.Auth::guard('empresa')->user()->nome_url ?? null}}</p>
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
							Lorem Ipsum <i class="fas fa-chevron-down"></i>
						</h2>
						<ul>
							<li><a href="#">Lorem Ipsum</a></li>
							<li>Lorem Ipsum</li>
							<li>Lorem Ipsum</li>
						</ul>
					</section>
				</div>
			</section>
		</div>
		<div class="col-md-8 col-md-offset-1 col-xs-12">

			<section class="dashboard-dados-vagas negative">

				@if(Session('success'))
				<div class="alert alert-success" style="margin:20px 0; color:green;">
					<b><i class="fas fa-check"></i> {{ Session('success') }}</b>
				</div>
				@elseif(Session('error'))
				<div class="alert alert-danger" style="margin:20px 0; color:red;">
					<b><i class="fas fa-times-circle"></i> {{ Session('error') }}</b>
				</div>
				@endif

				<div class="abas-area">
					<a class="aba active" data-open="vagas">Minhas vagas</a>
					<a class="aba" data-open="meus-dados">Meus dados</a>
				</div>
				<div class="content-aba">
					<div class="content vagas active">
						<ul>
							@if(count($vagas) >= 1)
							@foreach($vagas as $vaga)
							<li>
								<div class="infos-vaga">
									<span class="edit"><i class="fas fa-edit"></i></span>
									<span class="nome-vaga">{{ $vaga->titulo ?? 'N/I' }}</span>
									<span class="n-candidatos">10 <i class="fas fa-user"></i></span>
									@if(!$vaga->pausar_vaga)
									<span class="ativa">Ativa</span>
									@else
									<span class="pausada">Pausada</span>
									@endif
								</div>
								<a href="#" onclick="abrir_modal_editar({{ $vaga->id }})" class="cta ver-candidatos">Ver candidatos</a>
							</li>

							@endforeach
							@else
							<p>Ainda não há vagas!</p>
							@endif


						</ul>
						<div class="area-botao">
							<button id="nova-vaga">Adicionar nova vaga</button>
						</div>

						<!---MODAL NOVA VAGA--->
						@include('empresa.dashboard.modal_nova_vaga')

					</div>

					<div class="content meus-dados">
						@include('empresa.dashboard.form_meus_dados')
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
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

	$("#cep_vaga").change(function() {
		var cep = $("#cep_vaga").val();
		if (cep != '') {
			$.get('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
				if (data != '') {
					$("#rua_vaga").val(data['logradouro']);
					$("#complemento_vaga").val(data['complemento']);
					$("#cidade_vaga").val(data['localidade']);
					$("#bairro_vaga").val(data['bairro']);
					$("#estado_vaga").val(data['uf']);
				} else {
					$("#rua_vaga").val('');
					$("#complemento_vaga").val('');
					$("#cidade_vaga").val('');
					$("#bairro_vaga").val('');
					$("#estado_vaga").val('');
				}
			});
		} else {
			$("#rua_vaga").val('');
			$("#complemento_vaga").val('');
			$("#cidade_vaga").val('');
			$("#bairro_vaga").val('');
			$("#estado_vaga").val('');
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