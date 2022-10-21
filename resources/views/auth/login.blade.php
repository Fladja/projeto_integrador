@extends('base')

@section('title')
Login
@stop

@section('head')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@stop

@section('content')

    <main class="container">
        

        <div class="form-auth shadow-lg">
        <h1 class="text-center">Login</h1>
        <form action="{{url('login')}}" method="post">
            @csrf
            <input class="form-control mt-3" type="email" name="email" id="email_id" placeholder="email">
            <input class="form-control mt-3" type="password" name="password" id="password_id" placeholder="senha">
            <div class="text-center">
                <button class="btn btn-success mt-3">Entrar</button>
            </div>
        </form>
        </div>

    </main>

@stop