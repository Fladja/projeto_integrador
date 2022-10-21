@extends('base')

@section('title')
Dashboard
@stop

@section('content')
    @include('layouts.navbar')

    <main class="container">
        <h1 class="mt-3">Bem-vindo, {{ auth()->user()->name }}!</h1>

        <div class="row text-center mt-3">
            <div class="col">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Livros</div>
                    <div class="card-body">
                        <img width="200" src="{{asset('assets/img/livros.webp')}}" alt="">
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{route('livros')}}"><button class="btn btn-success">Acessar</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Computadores</div>
                    <div class="card-body">
                        <img width="200" src="{{asset('assets/img/computador.png')}}" alt="">
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{route('computadores')}}"><button class="btn btn-success">Acessar</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Salas</div>
                    <div class="card-body">
                        <img width="200" src="{{asset('assets/img/sala.png')}}" alt="">
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{route('salas')}}"><button class="btn btn-success">Acessar</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @if(auth()->user()->tipo == 0)
            <div class="col">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <img width="120" src="{{asset('assets/img/users.png')}}" alt="">
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{route('users')}}"><button class="btn btn-success">Acessar</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </main>
@stop