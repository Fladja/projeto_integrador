@extends('base')

@section('title')
Editar Computador
@endsection

@section('content')
    @include('layouts.navbar')
    <main class="container">
    <h1 class="text-center">Editar Computador</h1>

    <form action="{{route('computador-update', ['id' => $computador->id])}}" method="post">
        @csrf
        <label class="mt-2" for="nome">Identificacao do Computador</label>
        <input class="form-control" type="text" name="identificacao" id="identificacao" value="{{$computador->identificacao_comp}}" placeholder="Identificacao do Computador" required>
            <button class="btn btn-success mt-4">Salvar</button>
        </div>
    </form>
    </main>

@endsection