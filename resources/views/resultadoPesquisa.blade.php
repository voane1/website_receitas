<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Resultado da pesquisa</title>
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
    <h1>Resultado para: {{ $consulta }}</h1>

    <div class="cont-result-category">
        <div class="box-category">
            <p>Categoria</p>
            <div class="list-category">
                <ul>
                    <a href="">
                        <li>Item one</li>
                    </a>
                </ul>
            </div>
        </div>
        <!-- item de receitas -->
        <div class="container-receitas">
@foreach($resultado as $resultado)    <!-- Aqui vai ser o for -->
            <div class="cont-item-receitas">
                <!-- Imagem da receita -->
                <img src="/storage/imagens/{{ $resultado->url_imagem_receita }}" alt="Imagem da receita" class="box-img-receita">
                <!-- Receitas e comentários-->
                <div class="box-receitas">
                    <!-- Receita -->
                    <div class="cont-receita">
                    <a href="/itemPesquisa/{{ $resultado->id }}">
                        <h4>{{ $resultado->nome_receita }}</h4>
                    </a>
                        <p>País: {{ $resultado->pais }}</p>
                        <p>By: {{ $resultado->id_utilizador }}</p>
                        <div class="interacao">
                            <!-- Curtida -->
                            <div>
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.248c-3.148-5.402-12-3.825-12 2.944 0 4.661 5.571 9.427 12 15.808 6.43-6.381 12-11.147 12-15.808 0-6.792-8.875-8.306-12-2.944z"/></svg>
                                </button>
                                <button>
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg>
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

                    <!-- Comentários da receita -->
                    <div class="cont-form-comment">
                        <p id="comentario">Comentário</p>
                        <span>
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M20 15c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m-3 0c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m-3 0c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m5.415 4.946c-1 .256-1.989.482-3.324.482-3.465 0-7.091-2.065-7.091-5.423 0-3.128 3.14-5.672 7-5.672 3.844 0 7 2.542 7 5.672 0 1.591-.646 2.527-1.481 3.527l.839 2.686-2.943-1.272zm-13.373-3.375l-4.389 1.896 1.256-4.012c-1.121-1.341-1.909-2.665-1.909-4.699 0-4.277 4.262-7.756 9.5-7.756 5.018 0 9.128 3.194 9.467 7.222-1.19-.566-2.551-.889-3.967-.889-4.199 0-8 2.797-8 6.672 0 .712.147 1.4.411 2.049-.953-.126-1.546-.272-2.369-.483m17.958-1.566c0-2.172-1.199-4.015-3.002-5.21l.002-.039c0-5.086-4.988-8.756-10.5-8.756-5.546 0-10.5 3.698-10.5 8.756 0 1.794.646 3.556 1.791 4.922l-1.744 5.572 6.078-2.625c.982.253 1.932.407 2.85.489 1.317 1.953 3.876 3.314 7.116 3.314 1.019 0 2.105-.135 3.242-.428l4.631 2-1.328-4.245c.871-1.042 1.364-2.384 1.364-3.75"/></svg>
              </span>
                    </div>
                </div>
            </div>
@endforeach

      </div>

    <!-- ./item de receitas -->
</main>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
