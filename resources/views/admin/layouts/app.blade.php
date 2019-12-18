
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!--Icones--->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @routes
</head>

<body>
    <div id="app">
        @if(!empty(Auth::guard('admin')->user()))
        <nav class="navbar navbar-expand-md  bg-primary menu">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('img/logo.jpg') }}" class="rounded-circle img-fluid" width="50" title="{{ config('app.name', 'Laravel') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item ">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-home"></i></a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('admin.gerenciar.usuarios') }}" class="nav-link"><i class="fas fa-users"></i> Usuários</a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('admin.gerenciar.empresas') }}" class="nav-link"><i class="fas fa-truck-loading"></i> Empresas</a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('admin.gerenciar.vagas') }}" class="nav-link"><i class="fas fa-address-book"></i> Vagas</a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('admin.newsletter') }}" class="nav-link"><i class="fas fa-envelope"></i> Newsletter</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-blog"></i> Blog
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.blog') }}"> <i class="fas fa-file"></i> Posts</a>
                                <a class="dropdown-item" href="{{ route('admin.blog.categoria') }}"> <i class="fas fa-tag"></i> Categorias</a>
                            </div>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary "><i class="fas fa-satellite"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link Fdropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <b><i class="fas fa-user"></i> {{ Auth::guard('admin')->user()->nome }} <span class="caret"></span></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.perfil') }}"> <i class="fas fa-lock"></i> Alterar Senha</a>
                                <a class="dropdown-item" href="{{ route('admin.sair') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </a>
                                <form id="logout-form" action="{{ route('admin.sair') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {

        })
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