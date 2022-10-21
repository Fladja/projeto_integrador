@extends('base')

@section('title')
Cadastro do Usuario
@stop

@section('head')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@stop

@section('content')
<main class="container">
    <div class="form-auth-register mt-3 mb-3">
    <h1 class="text-center">Cadastro</h1>
    <form action="{{url('register')}}" method="post">
        @csrf
        <label class="mt-2" for="name">Nome</label>
        <input type="text" class="form-control mt-3" id="name" name="name" placeholder="Nome" required>
        <label class="mt-2" for="name">Email</label>
        <input type="email" class="form-control mt-3" name="email" id="email" placeholder="Email" required>
        <label class="mt-2" for="name">Senha</label>
        <input type="password" class="form-control mt-3" name="password" id="password" placeholder="Senha" required>
        <label class="mt-2" for="name">Confirmação de Senha</label>
        <input type="password" class="form-control mt-3" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Senha" required>
        <label class="mt-2" for="name">Matricula</label>
        <input type="text" class="form-control mt-3" name="matricula" id="matricula" placeholder="Matricula" required>
        <label class="mt-2" for="name">Data de nascimento</label>
        <input type="date" class="form-control mt-3" name="nascimento" id="nascimento" placeholder="Data de nascimento" required>
        <label class="mt-2" for="name">Cpf</label>
        <input type="text" class="form-control mt-3" name="cpf" id="cpf" placeholder="CPF" maxlength="14" required>
        <label class="mt-2" for="name">Telefone</label>
        <input type="text" class="form-control mt-3" name="telefone" id="telefone" placeholder="Telefone" maxlength="11" required>
        
        <div class="text-center">
            <button class="btn btn-success mt-3">Registrar</button>
        </div>
    </form> 
    </div>

</main>

@stop
