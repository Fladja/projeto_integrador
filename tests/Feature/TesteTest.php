<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;

class TesteTest extends TestCase
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

        $response = $this->get('/salas');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

}
