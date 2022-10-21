@extends('base')

@section('title')
Dashboard de Usuarios
@endsection

@section('content')
    @include('layouts.navbar')

    <main class="container">

    @if ($users)
        <h1 class="text-center">Usuarios</h1>
        <div class="table-responsive shadow-lg">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matricula</th>
                    <th>Nascimento</th>
                    <th>Cpf</th>
                    <th>Telefone</th>
                    @if(auth()->user()->tipo == 0)
                    <th>Remover</th>
                    @endif
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->matricula}}</td>
                        <td>{{ \Carbon\Carbon::parse($user->nascimento)->format('d/m/Y')}}</td>
                        <td>{{$user->cpf}}</td>
                        <td>{{$user->telefone}}</td>
                        <td class="trash-icon">
                            <form action="{{route('users-remove', ['id' => $user->id])}}" method="post">
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