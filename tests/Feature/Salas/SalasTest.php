<?php

namespace Tests\Feature\Book;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;

class SalasTest extends TestCase
{
    use RefreshDatabase;

    public function test_PaginaDeRegistroDeSalaUsuarioLogado()
    {
        //Aqui estou acessar a página de cadastro de salas com o usuario logado
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/salas/create');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    public function test_PaginaDeRegistroDeSalaUsuarioNaoLogado()
    {
        //Aqui estou acessar a página de cadastro de salas com o usuario nao logado

        $response = $this->get('/salas/create');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    //----------------------------------------------------------------------------------------

    public function test_ListarSalasUsuarioLogado()
    {
        //Aqui estou a listar as salas com o usuario logado
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/salas');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    public function test_ListarSalasUsuarioNaoLogado()
    {
        //Aqui estou acessar a página de listar as salas com o usuario nao logado

        $response = $this->get('/salas');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }
    
    //----------------------------------------------------------------------------------------


    public function test_RegistroDeSalaUsuarioLogado()
    {
        //Aqui estou acessar a página de cadastro de salas com o usuario logado
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->post('/salas/create');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    public function test_RegistroDeSalaUsuarioNaoLogado()
    {
        //Aqui estou acessar a página de cadastro de salas com o usuario nao logado

        $response = $this->get('/salas/create');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    //----------------------------------------------------------------------------------------

}