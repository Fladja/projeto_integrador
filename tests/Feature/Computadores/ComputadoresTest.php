<?php

namespace Tests\Feature\Book;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 
use App\Models\User;
use App\Models\Book;
use App\Models\Computadores;

class ComputadoresTest extends TestCase

{
    use RefreshDatabase;

    public function test_PaginaDeRegistroComputadorUsuarioLogado() //teste usuario logado
    {
        //criando usuário fake
        $user= User::factory()->create();
        
        //simulando login
        $response=$this->post('/login',[
            'email'=>$user->email,
            'password'=>'password',
        ]);

        //mandando requisição para a página de adicionar novo computador
        $response=$this->get('/computador/create');

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    } 

    
    public function test_PaginaDeRegistroComputadorUsuarioNaoLogado() //teste usuario não logado
    {
        //mandando requisição para a página de adicionar novo computador
        $response=$this->get('/computador/create');

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    } 
}