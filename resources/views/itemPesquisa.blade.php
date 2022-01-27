<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Receita</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<!-- Menu -->
<div class="cont-menu">
    <div class="div-menu container">
        <img src="{{URL('imagens/logo.jpg')}}" alt="Logo" width="200">
        <div class="div-right">
            <nav>
                <ul>
                    <a href="/">
                        <li>Home</li>
                    </a>
                    <a href="">
                        <li>Gerir Perfil</li>
                    </a>
                    <a href="{{URL('/minhasReceitas')}}">
                        <li>Minhas Receitas</li>
                    </a>
                    <a href="">
                        <li>Favoritos</li>
                    </a>
                </ul>
            </nav>
            <div class="box-login">
                <img src="{{URL('imagens/person.jpg')}}" alt="Icon Person" width="666">
                <a href="">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- ./Menu -->

<main class="container">
    <h1>{{ $receita->nome_receita }}</h1>

    <!-- div geral -->
    <div class="cont-geral">
        <!-- imagem da receita -->
        <div class="img-receita">
            <!-- Imagem vem do banco -->
            <img src="/storage/imagens/{{ $receita->url_imagem_receita }}" alt="Imagem ilustrativa da receita" width="300px">
            <div class="interacao">
                <!-- Curtida -->
                <div>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.248c-3.148-5.402-12-3.825-12 2.944 0 4.661 5.571 9.427 12 15.808 6.43-6.381 12-11.147 12-15.808 0-6.792-8.875-8.306-12-2.944z"/></svg>
                    </button>

                </div>
                <!-- Avaliação -->
                <div>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>

                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M15.668 8.626l8.332 1.159-6.065 5.874 1.48 8.341-7.416-3.997-7.416 3.997 1.481-8.341-6.064-5.874 8.331-1.159 3.668-7.626 3.669 7.626zm-6.67.925l-6.818.948 4.963 4.807-1.212 6.825 6.068-3.271 6.069 3.271-1.212-6.826 4.964-4.806-6.819-.948-3.002-6.241-3.001 6.241z"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- div posição direita -->
        <div class="cont-right">
            <!-- ingredientes e modo de preparo -->
            <div class="box-ingredientes">
                <!-- ingredientes -->
                <h4>Ingredientes</h4>
                <div class="ingredientes-receita">
                    <!-- Buscar valores atraves do PHP -->
                    <p id="ingredientes">
                        {{ $receita->ingredientes_receita }}
                    </p>
                </div>
                <!-- modo de preparo -->
                <h4>Modo de preparo</h4>
                <div class="preparo-receita">
                    <!-- Buscar valores atraves do PHP -->
                    <p id="preparo">
                        {{ $receita->preparo_receita }}
                        Tempo de Preparo : {{ $receita->tempo_preparo }}

                    </p>
                </div>
                <h4>Chef</h4>
                <div class="preparo-receita">
                    <!-- Buscar valores atraves do PHP -->
                    <p id="nome">
                        Feito por: {{ $receita->nome }}

                    </p>
                </div>
                <h4>País</h4>
                <div class="preparo-receita">
                    <!-- Buscar valores atraves do PHP -->
                    <p id="pais">
                        {{ $receita->pais }}

                    </p>
                </div>
            </div>
        </div>
        <!-- ./div posição direita -->

    </div>

</main>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
