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
            <img src="../img-receita.jpg" alt="Imagem ilustrativa da receita" width="300px">
            <button class="btn-default">Alterar imagem</button>
        </div>
        <!-- div posição direita -->
        <div class="cont-right">
            <!-- ingredientes e modo de preparo -->
            <div class="box-ingredientes">
                <!-- ingredientes -->
                <div class="ingredientes">
                    <h4>Ingredientes</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <form>
              <textarea name="ingredientes" id="ingredientes" rows="7">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
              </textarea>
                    </form>
                </div>
                <!-- modo de preparo -->
                <div class="preparo">
                    <h4>Modo de preparo</h4>
                    <!-- Buscar valores atraves do PHP -->
                    <form>
              <textarea name="preparo" id="preparo" rows="7">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
              </textarea>
                    </form>
                </div>
            </div>
            <!-- botões -->
            <div class="cont-btn">
                <button class="btn-back">Voltar</button>
                <button class="btn-save">Salvar</button>
            </div>
        </div>
        <!-- ./div posição direita -->

    </form>
    </div>

</main>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>