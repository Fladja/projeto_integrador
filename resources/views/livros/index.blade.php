@extends('base')

@section('title')
Dashboard de Livros
@endsection

@section('content')
    @include('layouts.navbar')

    <main class="container">
    @if(auth()->user()->tipo == 0)
        <a href="{{route('livros-create')}}"><button class="btn btn-success mt-4">Adicionar Livro</button></a>
    @endif
    @if ($livros)
        <h1 class="text-center">Livros</h1>
        <div class="table-responsive shadow-lg mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Publicado em</th>
                    <th>Gênero</th>
                    <th>Categoria</th>
                    @if(auth()->user()->tipo == 0)
                    <th></th>
                    <th></th>
                    @endif
                </thead>
                <tbody>
                @if(auth()->user()->tipo == 0)
                    @foreach($livros as $livro)
                        <tr>
                            <td>{{$livro->nome}}</td>
                            <td>{{$livro->autor}}</td>
                            <td>{{ \Carbon\Carbon::parse($livro->publicacao)->format('d/m/Y')}}</td>
                            <td>{{$livro->genero}}</td>
                            <td>{{$livro->categoria}}</td>
                            <td class="pen-icon">
                                    <a href="{{route('livros-edit', ['id' => $livro->id])}}"><i class="fa-solid fa-pen"></i></a>
                            </td>
                            <td class="trash-icon">
                                <form action="{{route('livros-remove', ['id' => $livro->id])}}" method="post">
                                    @csrf
                                    <button><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                @foreach($livros as $livro)
                    <tr>
                        <td>{{$livro->nome}}</td>
                        <td>{{$livro->autor}}</td>
                        <td>{{ \Carbon\Carbon::parse($livro->publicacao)->format('d/m/Y')}}</td>
                        <td>{{$livro->genero}}</td>
                        <td>{{$livro->categoria}}</td>
                    </tr>
                    @endforeach
                @endif
                
                </tbody>
            </table>
        </div>
        @endif
    </main>
@endsection