@extends('base')

@section('title')
Dashboard de Salas
@endsection

@section('content')
    @include('layouts.navbar')

    <main class="container">
    @if(auth()->user()->tipo == 0)
        <a href="{{route('salas-create')}}"><button class="btn btn-success mt-4">Adicionar Sala</button></a>
    @endif

    @if ($salas)
        <h1 class="text-center">Salas</h1>
        <div class="table-responsive shadow-lg">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Numero</th>
                    @if(auth()->user()->tipo == 0)
                    <th>Editar</th>
                    <th>Remover</th>
                    @endif
                </thead>
                <tbody>
                @foreach($salas as $sala)
                <tr>
                    <td>{{$sala->numero}}</td>
                        <td class="pen-icon">
                            <a href="{{route('salas-edit', ['id' => $sala->id])}}"><i class="fa-solid fa-pen"></i></a>
                        </td>
                        <td class="trash-icon">
                            <form action="{{route('salas-remove', ['id' => $sala->id])}}" method="post">
                                @csrf
                                <button><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    </main>
@endsection