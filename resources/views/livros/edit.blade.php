@extends('base')

@section('title')
Editar Livro
@stop

@section('content')
@include('layouts.navbar')
    <main class="container">
    <form action="{{route('livros-update', ['id' => $livro->id])}}" method="post">
        @csrf
        <label class="mt-2" for="nome">Titulo</label>
            <input class="form-control" type="text" name="nome" id="nome" value="{{$livro->nome}}" placeholder="Titulo do Livro" required>
        <label class="mt-2" for="autor">Autor</label>
            <input class="form-control" type="text" name="autor" id="autor" value="{{$livro->autor}}" placeholder="Autor" required>
        <label class="mt-2" for="publicacao">Data de Publicação</label>
            <input class="form-control" type="date" name="publicacao" id="publicacao" value="{{$livro->publicacao}}" placeholder="Data de Publicação" required>
        <label class="mt-2" for="genero">Gênero</label>
            <input class="form-control" type="text" name="genero" id="genero" value="{{$livro->genero}}" placeholder="Genero do Livro" required>
        <label class="mt-2" for="categoria">Categoria</label>
            <input class="form-control" type="text" name="categoria" id="categoria" value="{{$livro->categoria}}" placeholder="Categoria do Livro" required>
        <div class="text-center mt-3">
            <button class="btn btn-success">Salvar</button>
        </div>
    </form>

    </main>
@stop