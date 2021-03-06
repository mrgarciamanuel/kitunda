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

        <!--Formatações do mapa-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
        <style>
        
        </style>

        <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
        
    </head>
    <body>

        <!--MENU PRINCIPAL DO SITE-->
        <header id="navbar">
            <nav class="navbar navbar-expand-lg" id="menu-principal">
                <div class="container" >
                    <a class="navbar-brand" id="menu-principal-item-logo" href="/">KITUNDA</a>
                    <button class="navbar-toggler" id="item-menu-botao" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon" id="item-menu-botao1"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Inicio do formulário da pesquisa de produtos-->
                        <form action="search" class="d-flex">
                            <input class="form-control me-2" name="query" type="search" placeholder="Procurar. Ex:'Banana' " aria-label="Search">
                            <button class="btn btn-outline-success" id="btn-pesquisar" type="submit">Pesquisar</button>
                        </form> 
                        <!--Fim do formulário da pesquisa de produtos-->  

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item" id="menu-principal-item"><a class="nav-link" href="/">
                                Página inicial</a>
                            </li>

                            <div class="dropdown" id="dropdown-menu-principal-">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonCat" data-bs-toggle="dropdown" aria-expanded="false">
                                    Produtos
                                    </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="dropdown-1">
                                    @foreach($categories as $category)
                                        <li><a class="dropdown-item" id="dropdown-2-items" href="category/{{$category['id']}}">{{$category->name}}</a></li>
                                    @endforeach    
                                    
                                </ul>
                            </div>

                            <li class="nav-item" id="menu-principal-item"><a class="nav-link" href="contact">
                                Contacte-nos</a>
                            </li>

                            <li class="nav-item" id="menu-principal-item"><a class="nav-link" href="about">
                                Sobre</a>
                            </li>

                            <li class="nav-item" id="menu-principal-item"><a class="nav-link" href="/favolist">
                            <ion-icon name="heart-outline"></ion-icon></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="menu-principal-item" href="/cartlist">
                                    <ion-icon name="cart-outline" size="large">
                                    </ion-icon>{{$total}}
                                </a>
                            </li>                   

                            <!--caso o utilizador seja autentiticado no sistema-->
                            @auth
                                <div class="dropdown" id="dropdown-menu-principal">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Conta
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dropdown-1">
                                        <li><a class="dropdown-item" href="/dashboard" id="dropdown-1-items">Minha conta</a></li>
                                        <li class="nav-item" id="dropdown-2-items">
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <li><a class="nav-link" id="dropdown-1-items" href="/logout" 
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                            Sair</a></li>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                            <!--caso o utilizador não seja autentiticado-->
                            @guest
                            <div class="dropdown" id="dropdown-menu-principal">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Acesso
                                    </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="dropdown-1">
                                    <li><a class="dropdown-item" id="dropdown-2-items" href="/login">Login</a></li>
                                    <li><a class="dropdown-item" id="dropdown-2-items" href="/register">Registar</a></li>
                                    
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
                            <h6 class="card-item"><a href="/">Página inicial</a></h6>
                            <h6 class="card-item"><a href="/about">Sobre</a></h6>
                            <h6 class="card-item"><a href="/dashboard">Conta</a></h6>
                            <h6 class="card-item"><a href="cartlist">Saco de compras</a></h6>
                            <h6 class="card-item"><a href="/contact">Contate-nos</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="car">
                        <div class="card-body">
                            <h4 class="card-title">Alimentares</h4>
                            <h6 class="card-item"><a href="category/1">Cereais</a></h6>
                            <h6 class="card-item"><a href="category/2">Farinha</a></h6>
                            <h6 class="card-item"><a href="category/3">Feijões</a></h6>
                            <h6 class="card-item"><a href="category/4">Tuberculos</a></h6>
                            <h6 class="card-item"><a href="category/5">Frutas</a></h6>
                            <h6 class="card-item"><a href="category/6">Legumes</a></h6>
                            <br><a href="/show" class="btn btn-primary" id="verBtn">Ver produtos</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="car">
                        <div class="card-body">
                            <h4 class="card-title">Não alimentares</h4>
                            <h6 class="card-item"><a href="category/7">Tecnologia agricola</a></h6>
                            <h6 class="card-item"><a href="category/8">Fitofarmacêuticos</a></h6>
                            <h6 class="card-item"><a href="category/9">Sementes</a></h6>
                            <br><a href="/show" class="btn btn-primary" id="verBtn">Ver produtos</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FIM RODAPÉ DO SITE COM MENUS-->
        
        <!-- INÍCIO RODAPÉ FINAL DO SITE-->
        <footer id="low-footer">            
                <div class="container text-center" >
                    <br><small id="lowfooter-div">Kitunda Copyright &copy; 2022</small><br><br>
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