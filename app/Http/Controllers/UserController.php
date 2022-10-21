<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('dashboard');
        }
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     if(!(auth()->user()->tipo == 0)){
    //         return redirect('users');
    //     }
    //     return view('users.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!(auth()->user()->tipo == 0)){
            return redirect('users');
        }
        $validator = Validator::make($request->all(), [
            'numero' => 'required|max:191',
        ]);
 
        if ($validator->fails()) {
            return redirect('users-create');
        }

        $user = User::create([
            'numero' => $request->numero,
        ]);
        
        return redirect('users');
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
            return redirect('users');
        }
        $user = User::find($id);
        if ($user === null){
            return redirect('users');
        }
        return view('users.edit', compact('user'));
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
            return redirect('users');
        }
        $validator = Validator::make($request->all(), [
            'numero' => 'required|string|max:191',
        ]);
 
        if ($validator->fails()) {
            return redirect('users');
        }

        $user = User::find($id);
        $user->numero = $request->numero;
        $user->save();
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
            return redirect('users');
        }
        $user = User::find($id);
        if($user === null){
            return redirect('users');
        }
        $user->delete();
        return redirect('users');
    }
}

