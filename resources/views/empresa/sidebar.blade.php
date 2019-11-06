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
		<!-- <div class="col-xs-12 col-md-8 col-md-offset-1">
			<section class="search-job">
				<h3>Ainda não encontrou uma vaga?</h3>
				<div class="search-input">
					<input type="text" placeholder="Buscar vagas..." />
					<i class="fas fa-search"></i>
				</div>
			</section>
		</div> -->
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