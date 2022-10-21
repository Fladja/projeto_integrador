<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Computadore;

class ComputadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computadores = Computadore::all();
        return view('computadores.index', compact('computadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('computadores');
        }
        return view('computadores.create');
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
            return redirect('computadores');
        }
        $validator = Validator::make($request->all(), [
            'identificacao' => 'required|max:191',
        ]);
 
        if ($validator->fails()) {
            return redirect('computador-create');
        }

        $computador = Computadore::create([
            'identificacao_comp' => $request->identificacao,
        ]);
        
        return redirect('computadores');
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
            return redirect('computadores');
        }
        $computador = Computadore::find($id);
        if ($computador === null){
            return redirect('computadores');
        }
        return view('computadores.edit', compact('computador'));
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
            return redirect('computadores');
        }
        $validator = Validator::make($request->all(), [
            'identificacao' => 'required|max:191',
        ]);
 
        if ($validator->fails()) {
            return redirect('computadores');
        }

        $computador = Computadore::find($id);
        $computador->identificacao_comp = $request->identificacao;
        $computador->save();
        return redirect('computadores');
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
            return redirect('computadores');
        }
        $computador = Computadore::find($id);
        if($computador === null){
            return redirect('computadores');
        }
        $computador->delete();
        return redirect('computadores');
    }
}
