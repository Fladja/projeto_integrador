<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;


    public function test_PaginaLogin()
    {
        //testando a visualização da página de login
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_Autenticacao()
    {
        //testando se os usuários conseguem fazer login
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_AutenticacaoSenhaInvalida()
    {
        //tentando logar com senha errada
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

}
