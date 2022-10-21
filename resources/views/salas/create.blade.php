@extends('base')

@section('title')
Adicionar Sala
@endsection

@section('content')
    @include('layouts.navbar')
    <main class="container">
    <h1 class="text-center">Adicionar Sala</h1>

    <form action="{{route('salas-store')}}" method="post">
        @csrf
        <label class="mt-2" for="nome">Numero da Sala</label>
        <input class="form-control" type="text" name="numero" id="numero" placeholder="Numero da Sala" required>
            <button class="btn btn-success mt-4">Salvar</button>
        </div>
    </form>
    </main>

@endsection