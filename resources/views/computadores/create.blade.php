@extends('base')

@section('title')
Adicionar Computador
@endsection

@section('content')
    @include('layouts.navbar')
    <main class="container">
    <h1 class="text-center">Adicionar Computador</h1>

    <form action="/computador/create"  method="post">
        @csrf
        <label class="mt-2" for="nome">Identificacao do Computador</label>
        <input class="form-control" type="text" name="identificacao_comp" id="identificacao" placeholder="Identificacao do Computador" required>
            <button class="btn btn-success mt-4">Salvar</button>
        </div>
    </form>
    </main>

@endsection