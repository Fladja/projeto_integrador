@extends('base')

@section('title')
Dashboard de Computadores
@endsection

@section('content')
    @include('layouts.navbar')

    <main class="container">
    @if(auth()->user()->tipo == 0)
        <a href="{{route('computador-create')}}"><button class="btn btn-success mt-4">Adicionar Computador</button></a>
    @endif
    @if ($computadores)
        <h1 class="text-center">Computadores</h1>
        <div class="table-responsive shadow-lg mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <th>identificação</th>
                    @if(auth()->user()->tipo == 0)
                    <th></th>
                    <th></th>
                    @endif
                </thead>
                <tbody>
                @if(auth()->user()->tipo == 0)
                    @foreach($computadores as $computador)
                        <tr>
                            <td>{{$computador->identificacao_comp}}</td>
                            <td class="pen-icon">
                                    <a href="{{route('computador-edit', ['id' => $computador->id])}}"><i class="fa-solid fa-pen"></i></a>
                            </td>
                            <td class="trash-icon">
                                <form action="{{route('computador-remove', ['id' => $computador->id])}}" method="post">
                                    @csrf
                                    <button><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                @foreach($computadores as $computador)
                    <tr>
                        <td>{{$computador->identificacao_comp}}</td>
                    </tr>
                    @endforeach
                @endif
                
                </tbody>
            </table>
        </div>
        @endif
    </main>
@endsection