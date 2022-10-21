<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Livro;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = livro::all();
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('livros');
        }
        return view('livros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('livros');
        }
        $validator = Validator::make($request->all(), [
            'nome' => 'required|unique:livros|max:45',
            'autor' => 'required|max:45',
            'publicacao' => 'required|date',
            'genero' => 'required|max:45',
            'categoria' => 'required|max:45',
        ]);
 
        if ($validator->fails()) {
            return redirect('livros-create');
        }

        $livro = Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'publicacao' => $request->publicacao,
            'genero' => $request->genero,
            'categoria' => $request->categoria
        ]);
        
        return redirect('livros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('livros');
        }
        $livro = Livro::find($id);
        if ($livro === null){
            return redirect('livros');
        }
        return view('livros.edit', compact('livro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('livros');
        }
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:45',
            'autor' => 'required|string|max:45',
            'publicacao' => 'required|date',
            'genero' => 'required|string|max:45',
            'categoria' => 'required|string|max:45',
        ]);
 
        if ($validator->fails()) {
            return redirect('livros');
        }

        $livro = Livro::find($id);
        $livro->nome = $request->nome;
        $livro->autor = $request->autor;
        $livro->publicacao = $request->publicacao;
        $livro->genero = $request->genero;
        $livro->nome = $request->nome;
        $livro->save();
        
        return redirect('livros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('livros');
        }
        $livro = Livro::find($id);
        if($livro === null){
            return redirect('livros');
        }
        $livro->delete();
        return redirect('livros');
    }
}
