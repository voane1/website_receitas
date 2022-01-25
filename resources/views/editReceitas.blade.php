<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Editar Receitas</title>
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
    <h1>Editar Receitas</h1>

    <!-- div geral -->
    <div class="cont-geral">
        <!-- imagem da receita -->
    <form action="/minhasReceitas/{{$receita->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="img-receita">
            <!-- Imagem vem do banco -->
            <!-- Imagem da receita -->
            <img src="/storage/imagens/{{ $receita->url_imagem_receita }}" alt="Imagem da receita" class="box-img-receita">
            <input
                type="file" class="block shadow-5xl mb-10 p-2 w-80 italic" name="url_imagem_receita"  >
        </div>
        <!-- div posição direita -->
        <div class="cont-right">
            <!-- ingredientes e modo de preparo -->
            <div class="box-ingredientes">
                <!-- ingredientes -->
               <div class="ingredientes">
                    <h4>Nome Receita</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <input name="nome_receita" id="nome_receita" value="{{ $receita->nome_receita }}" class="form-control" required>

                </div>
                <div class="ingredientes">
                    <h4>País</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <input name="pais" id="pais" value="{{ $receita->pais }}">

                </div>
                <div class="ingredientes">
                    <h4>Ingredientes</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <textarea name="ingredientes_receita" id="ingredientes_receita" rows="7">
                    {{ $receita->ingredientes_receita }}
                        </textarea>
                </div>
                <div class="ingredientes">
                    <h4>Tempo Preparo</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <input name="tempo_preparo" id="tempo_preparo" value="{{ $receita->tempo_preparo }}">

                </div>

                <!-- modo de preparo -->
                <div class="preparo">
                    <h4>Modo de preparo</h4>
                    <!-- Buscar valores atraves do PHP -->

                    <textarea name="preparo_receita" id="preparo_receita" rows="7">
                     {{ $receita->preparo_receita }}
                    </textarea>

                </div>
                <div class="preparo">
                    <h4>Link Vídeo</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <textarea name="url_video" id="url_video" rows="2">
                    {{ $receita->url_video}}
                    </textarea>
                </div>
            </div>
            <!-- botões -->
            <div class="cont-btn">
                <a href="{{URL('/minhasReceitas')}}" >
                    <button class="btn-back">Voltar</button>
                </a>
                <button type="submit" class="btn-save">Salvar</button>
            </div>

    </form>
    </div>

</main>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
