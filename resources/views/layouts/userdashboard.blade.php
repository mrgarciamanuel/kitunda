<?php
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Auth;
    //se o utilizador não estiver autenticado, 
    //o carrinho estará sempre zerado 
    $total = 0;

    //se o utilizador estiver logado, será exibido o
    //número de produtos no carrinho
    if ($user = auth()->user()){
    $total = ProductController::cartItem();
    }
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title')</title>

        <!--css da aplicação-->
        <link rel="stylesheet" href="/css/estilo.css">

        <!--css Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <!--Fonte do google-->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@400;700&family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto" rel="stylesheet">       
    </head>
    <body class="antialiased">
        <!--MENU PRINCIPAL DO SITE-->
        <header id="navbar">
            <nav class="navbar navbar-expand-lg" id="menu-principal">
                <div class="container" >                 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @auth
                                <li class="nav-item"><a class="nav-link" href="dashboard">
                                    Meu perfil</a>
                                </li>

                                <li class="nav-item"><a class="nav-link" href="myorders">
                                    Minhas compras</a>
                                </li>

                                @if($user->id==1)
                                    <li class="nav-item">
                                        <a href="/productlist" class="nav-link">Produtos da loja</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="/create" class="nav-link">Criar produtos</a>
                                    </li>
                                @endif
                                <li class="nav-item"><a class="nav-link" href="/">
                                    Acesso a loja</a>
                                </li>
                                
                                <!-- Example split danger button -->
                                <div class="btn-group" id="dropdown-menu-minha-conta">
                                    <button type="button" class="btn btn-danger" id="dropdown-2-items">Opções</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="dropdown-2">
                                        <li><a class="dropdown-item" id="dropdown-2-items" href="#">Action</a></li>
                                        <li><a class="dropdown-item" id="dropdown-2-items" href="#" >Another action</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="nav-item">
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <a href="/logout" class="nav-link" 
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                Sair
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
        <!-- INÍCIO RODAPÉ FINAL DO SITE-->
        <footer id="low-footer">            
                <div class="container text-center">
                    <br><small>Kitunda Copyright &copy; 2022</small>
                </div>
        </footer>
        <!-- FIM RODAPÉ FINAL DO SITE-->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <!--Ion-icon-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>