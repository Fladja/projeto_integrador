<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistroTest extends TestCase
{
    use RefreshDatabase;

    public function test_PaginaRegistro()
    {
        //tentando entrar na página de registro
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_RegistroUsuario()
    {
        // tentando realizar registro
        $response = $this->post('/register', [
            'name' => 'Test User',
            'matricula' => '123123123',
            'cpf' => '123123123',
            'telefone' => '123123123',
            'nascimento' => \Carbon\Carbon::now(),
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
