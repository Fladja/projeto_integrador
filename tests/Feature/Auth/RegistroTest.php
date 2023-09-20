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
         /*
        /-------------------------------------------------------------
        /Este teste avalia a validação dos campos de registro de usuários;
        /-------------------------------------------------------------
        */

        //mandando a requisição com os dados corretos
        $response = $this->post('/register', [
            // 'name' => 'Test User',
            'matricula' => '123123123',
            'cpf' => '123123123',
            'telefone' => '123123123',
            'nascimento' => \Carbon\Carbon::now(),
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['name','matricula','cpf','telefone','nascimento','email','password','password_confirmation']);

        //verificando se o código da requisição é o código que estamos esperando receber
        $response->assertStatus(302);

        //verificando se esta redirecionando para a página esperada
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
