<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('site/assets/styles/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/styles/style.css') }}" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('site/assets/styles/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/utils/flexboxgrid.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/utils/scrollbar/simplebar.css') }}" />

    <script src="{{ asset('site/utils/jquery-3.4.1.min.js') }}"></script>
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="{{ asset('site/assets/styles/custom.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />



    <script src="{{ asset('site/assets/scripts/main.js') }}"></script>
    <title>Portal PCD</title>
    @routes
</head>

<body>
    <div id="shadow" style="display: none;">
    </div>
    <main id="container">
        <div class="wrapper container-fluid">
            <header class="site-header">
                <div class="logo">
                    <a href="{{ route('site.home') }}"><img src="{{ asset('site/img/logo.png') }}" alt="Busca PCD Empregos - Logo" /></a>
                </div>
                <nav class="secondary-nav">
                    <ul>

                        @if(Auth::guard('empresa')->user())
                        <li><a href="{{ route('site.login') }}#bloc_cad_vaga_empresa">Cadastre Vaga</a></li>
                        <li><a href="{{ route('empresa.dashboard') }}"><b>Meu Perfil</b></a></li>
                        @elseif(Auth::guard('usuario')->user())
                        <li><a href="{{ route('site.login') }}#bloc_cad_candidato">Cadastrar Curriculo</a></li>
                        <li><a href="{{ route('usuario.dashboard') }}"><b>Meu Perfil</b></a></li>
                        @else
                        <li><a href="{{ route('site.login') }}#bloc_cad_vaga_empresa">Cadastre Vaga</a></li>
                        <li><a href="{{ route('site.login') }}#bloc_cad_candidato">Cadastrar Curriculo</a></li>
                        @endif

                        <li>
                            @if(Auth::guard('empresa')->user() || Auth::guard('usuario')->user())

                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#" class="login"><i class="fas fa-user-circle"></i>&nbsp;Sair</a>
                            <form id="logout-form" action="@if(Auth::guard('empresa')->check()) {{ route('empresa.sair') }} @else {{ route('usuario.sair') }}  @endif" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <a href="{{ route('site.login') }}" class="login"><i class="fas fa-user-circle"></i>&nbsp;Login</a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
        <nav role="navigation" class="hide-sm">
            <div id="menuToggle">
                <!--
        A fake / hidden checkbox is used as click reciever,
        so you can use the :checked selector on it.
        -->
                <input type="checkbox" />

                <!--
        Some spans to act as a hamburger.
        
        They are acting like a real hamburger,
        not that McDonalds stuff.
        -->
                <span></span>
                <span></span>
                <span></span>

                <!--
        Too bad the menu has to be inside of the button
        but hey, it's pure CSS magic.
        -->
                <ul id="menu">
                    <a href="{{ route('site.login') }}">
                        <li> Login</li>
                    </a>
                    <a href="{{ route('site.login') }}#bloc_cad_candidato">
                        <li> Cadastrar Curriculo</li>
                    </a>
                    <a href="{{ route('site.login') }}#bloc_cad_vaga_empresa">
                        <li> Cadastrar Vaga</li>
                    </a>
                    <a href="{{ route('site.vagas') }}">
                        <li> Todas as Vagas</li>
                    </a>

                    <!--Variavel pg está vindo  do AppServiceProvider-->
                    @if(count($pg) > 0)
                    @foreach($pg as $p)
                    <a href="{{ route('site.pagina.show', $p->slug) }}">
                        <li>{{ $p->titulo }}</li>
                    </a>
                    @endforeach
                    @endif
                </ul>
            </div>
        </nav>

        <nav class="main-menu hide show-md">
            <ul style="justify-content:normal !important;">
                <li><a href="{{ route('site.vagas') }}">Todas as Vagas</a></li>
                <!--Variavel pg está vindo  do AppServiceProvider-->
                @if(count($pg) > 0)
                @foreach($pg as $p)
                <li><a href="{{ route('site.pagina.show', $p->slug) }}">{{ $p->titulo }}</a></li>
                @endforeach
                @endif
            </ul>
        </nav>
    </main>

    @yield('content')

    @if(Session('successNewsletter'))
    <section class="newsletter-form">
        <div style="width:100%; display:block; text-align:center;">
            <span>{{ Session('successNewsletter') }}</span>
            <p>Você receberá as melhores vagas, e novidades!</p>
        </div>
    </section>
    @elseif(Session('errorNewsletter'))
    <section class="newsletter-form">
        <div style="width:100%; display:block; text-align:center;">
            <span>Não foi possível cadastrar!</span>
            <p>{{ Session('errorNewsletter') }}</p>
        </div>
    </section>
    @endif



    <section class="newsletter-form" id="newsletter" @if(Session('successNewsletter') || Session('errorNewsletter')) style="margin-top:0 !important; @endif ">

        <div class="newsletter-form__icon"><i class="fas fa-envelope"></i></div>
        <h2 class="newsletter-form__title">
            Cadastre-se para receber todas as vagas e novidades
        </h2>
        <form action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <div class="newsletter-form__wrapper newsletter-form__wrapper--user">
                <input type="text" name="nome" placeholder="Digite seu nome" required />
            </div>
            <div class="newsletter-form__wrapper newsletter-form__wrapper--email">
                <input type="text" name="email" placeholder="Digite seu e-mail" required />
            </div>
            <button type="submit" class="newsletter-form__submit">Cadastre-se</button>
        </form>
    </section>
    <section class="footer">
        <div class="footer-submenu">
            <h2 class="footer-submenu__title">Candidatos</h2>
            <ul>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
            </ul>
        </div>
        <div class="footer-submenu">
            <h2 class="footer-submenu__title">Empresa</h2>
            <ul>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
            </ul>
        </div>
        <div class="footer-submenu">
            <a href="#"><img src="{{ asset('site/assets/images/logo-white.png')  }}" alt="" /></a>
        </div>
        <div class="footer-submenu">
            <h2 class="footer-submenu__title">Institucional</h2>
            <ul>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
            </ul>
        </div>
        <div class="footer-submenu">
            <h2 class="footer-submenu__title">Contato</h2>
            <ul>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
                <li><a href="#">Lorem ipsum sit</a></li>
            </ul>
        </div>

        <div class="social-menu">
            <ul>
                <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-instagram"></i> </a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.date').mask('00/00/0000');
            $('.time').mask('00:00:00');
            $('.date_time').mask('00/00/0000 00:00:00');
            $('.cep').mask('00000000');
            $('.telefone').mask('(00) 0000-0000');
            $('.celular').mask('(00) 00000-0000');
            $('.phone_us').mask('(000) 000-0000');
            $('.mixed').mask('AAA 000-S0S');
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.cnpj').mask('00.000.000/0000-00', {
                reverse: true
            });
            $('.money').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.tabelaDinamica').dataTable({
            language: {
                sEmptyTable: 'Nenhum registro encontrado',
                sInfo: 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
                sInfoEmpty: 'Mostrando 0 até 0 de 0 registros',
                sInfoFiltered: '(Filtrados de _MAX_ registros)',
                sInfoPostFix: '',
                sInfoThousands: '.',
                sLengthMenu: '_MENU_ Registros por página',
                sLoadingRecords: 'Carregando...',
                sProcessing: 'Processando...',
                sZeroRecords: 'Nenhum registro encontrado',
                sSearch: 'Pesquisar',
                oPaginate: {
                    sNext: 'Próximo',
                    sPrevious: 'Anterior',
                    sFirst: 'Primeiro',
                    sLast: 'Último'
                },
                order: []
            }
        });
    </script>
    @yield('scripts')



</body>

</html>