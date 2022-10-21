@extends('base')

@section('title')
Adicionar Livro
@endsection

@section('content')
    @include('layouts.navbar')
    <h1 class="text-center">Adicionar Livro</h1>

    <form action="{{route('livros-store')}}" method="post">
        @csrf
        <label class="mt-2" for="nome">Titulo</label>
        <input class="form-control" type="text" name="nome" id="nome" placeholder="Titulo do Livro" required>
        <label class="mt-2" for="autor">Autor</label>
        <input class="form-control" type="text" name="autor" id="autor" placeholder="Autor" required>
        <label class="mt-2" for="publicacao">Data de Publicação</label>
        <input class="form-control" type="date" name="publicacao" id="publicacao" placeholder="Data de Publicação" required>
        <label class="mt-2" for="genero">Gênero</label>
        <input class="form-control" type="text" name="genero" id="genero" placeholder="Genero do Livro" required>
        <label class="mt-2" for="categoria">Categoria</label>
        <input class="form-control" type="text" name="categoria" id="categoria" placeholder="Categoria do Livro" required>
        <div class="text-center mt-3">
            <button class="btn btn-success">Salvar</button>
        </div>
    </form>

@endsection