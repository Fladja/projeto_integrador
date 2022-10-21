<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sala;

class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('salas');
        }
        return view('salas.create');
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
            return redirect('salas');
        }
        $validator = Validator::make($request->all(), [
            'numero' => 'required|max:191',
        ]);
 
        if ($validator->fails()) {
            return redirect('salas-create');
        }

        $sala = Sala::create([
            'numero' => $request->numero,
        ]);
        
        return redirect('salas');
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
            return redirect('salas');
        }
        $sala = Sala::find($id);
        if ($sala === null){
            return redirect('salas');
        }
        return view('salas.edit', compact('sala'));
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
            return redirect('salas');
        }
        $validator = Validator::make($request->all(), [
            'numero' => 'required|string|max:191',
        ]);
 
        if ($validator->fails()) {
            return redirect('salas');
        }

        $livro = Sala::find($id);
        $livro->numero = $request->numero;
        $livro->save();
        return redirect('salas');
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
            return redirect('salas');
        }
        $sala = Sala::find($id);
        if($sala === null){
            return redirect('salas');
        }
        $sala->delete();
        return redirect('salas');
    }
}
