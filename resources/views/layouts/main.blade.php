<?php
            use App\Http\Controllers\ProductController;
            use Illuminate\Support\Facades\Auth;
            //se o utilizador não estiver autenticado, 
            //o carrinho estará sempre zerado 
            $total = 0;

            //se o utilizador estiver logado, será exibido o
            //número de produtos no seu carrinho
            if ($user = auth()->user()){
            $total = ProductController::cartItem();
            }
        ?>

<!DOCTYPE html>
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
    <body>

        <!--MENU PRINCIPAL DO SITE-->
        <header id="navbar">
            <nav class="navbar navbar-expand-lg" id="menu-principal">
                <div class="container" >
                    <a class="navbar-brand" href="/">KITUNDA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!--Inicio do formulário da pesquisa de produtos-->
                        <form action="search" class="d-flex">
                            <input class="form-control me-2" name="query" type="search" placeholder="Procurar produtos" aria-label="Search">
                            <button class="btn btn-outline-success" id="btn-pesquisar" type="submit">Pesquisar</button>
                        </form> 
                        <!--Fim do formulário da pesquisa de produtos-->  

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/">
                                Página inicial</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="/show">
                                Produtos</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="/create">
                                Criar produto</a>
                            </li>
                            
                            <li class="nav-item"><a class="nav-link" href="#">
                                Como comprar</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="#">
                                Blog</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="#">
                                Contacte-nos</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="/cartlist"><ion-icon name="cart-outline" size="large"></ion-icon>{{$total}}</a>
                            </li> 
                            <!--caso o utilizador seja autentiticado no sistema-->
                            @auth

                                <li class="nav-item"><a class="nav-link" href="myorders">
                                    Compras</a>
                                </li>

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Conta
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="/dashboard">Minha conta</a></li>
                                        <li class="nav-item">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a class="nav-link" href="/logout" 
                                        onclick="event.preventDefault();this.closest('form').submit();">
                                    Sair da conta</a>
                                    </form>
                                </li>
                                    </ul>
                                </div>
                            @endauth
                            <!--caso o utilizador não seja autentiticado-->
                            @guest
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Acesso
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/login">Login</a></li>
                                    <li><a class="dropdown-item" href="/register">Registar</a></li>
                                    
                                </ul>
                            </div>
                            @endguest

                            
                        </ul>

                        
                    </div>
                </div>
            </nav>

        </header>
           
        
    <!-- Em content, é onde será alocado todo o conteúdo de cada uma das páginas do nosso site-->
        

    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                @endif
                @yield('content')
            </div>
        </div>

    </main>

    <!-- INÍCIO RODAPÉ DO SITE COM MENUS-->
        <footer id="sticky-footer" class="flex-shrink-0 py-4 " >
            <div class="row">
                <div class="col-sm-4">
                    <div class="car">
                        <div class="card-body">
                            <h4 class="card-title">Links úteis</h4>
                            <h6 class="card-item"><a href="#">Página inicial</a></h6>
                            <h6 class="card-item"><a href="#">Blog</a></h6>
                            <h6 class="card-item"><a href="#">Sobre</a></h6>
                            <h6 class="card-item"><a href="#">Conta</a></h6>
                            <h6 class="card-item"><a href="#">Saco de compras</a></h6>
                            <h6 class="card-item"><a href="#">Conta-tos</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="car">
                        <div class="card-body">
                            <h4 class="card-title">Alimentares</h4>
                            <h6 class="card-item"><a href="#">Cereais</a></h6>
                            <h6 class="card-item"><a href="#">Farinha</a></h6>
                            <h6 class="card-item"><a href="#">Feijões</a></h6>
                            <h6 class="card-item"><a href="#">Tuberculos</a></h6>
                            <h6 class="card-item"><a href="#">Frutas</a></h6>
                            <h6 class="card-item"><a href="#">Legumes</a></h6>
                            <br><a href="/products/show" class="btn btn-primary" id="verBtn">Ver produtos</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="car">
                        <div class="card-body">
                            <h4 class="card-title">Não alimentares</h4>
                            <h6 class="card-item"><a href="#">Tecnologia agricola</a></h6>
                            <h6 class="card-item"><a href="#">Fitofarmacêuticos</a></h6>
                            <h6 class="card-item"><a href="#">Sementes</a></h6>
                            <br><a href="/products/show" class="btn btn-primary" id="verBtn">Ver produtos</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FIM RODAPÉ DO SITE COM MENUS-->
        
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