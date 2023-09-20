<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Computadore;

class ComputadoresTest extends TestCase
{
    use RefreshDatabase;

     public function test_PáginaDeRegistroDeComputador() //-- OK
     {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a página cadastro de computadores;
        /-------------------------------------------------------------
        */

         //criando um usuário falso;
         $user = User::factory()->create();

         //passando dados falsos
         $response = $this->post('/login', [
             'email' => $user->email,
             'password' => 'password',
         ]);

        //verificando se o usuário esta autenticado;
        $this->assertAuthenticated();

         //enviando requisição
         $response = $this->get('/computador/create');
         
         //código esperado para esta requisição;
         $response->assertStatus(200);
    }

// ----------------------------------------------------------------------

    public function test_RegistroDeComputador() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia o registro de computadores;
        /-------------------------------------------------------------
        */

        //criando um usuário falso
        $user = User::factory()->create();

        //passando dados falsos
        $response1 = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        //verificando se o usuário esta aunteticado
        $this->assertAuthenticated();

        //dados simulados
        $data = [
            'identificacao_comp'=>"12",      
        ];
        
        //acessando a rota de adicionar computadores no banco
        $response2 = $this->post('/computador/create',$data); 

        //verificando se os dados foram inseridos
        $this->assertDatabaseHas('computadores', $data);

        //rota esperada após a inserção no banco
        $response2->assertRedirect('/computadores');
        
        //código de resposta esperado
        $response2->assertStatus(302);
    }

// ----------------------------------------------------------------------

    public function test_ListarComputadores()  //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia o acesso a página de computadores salvos;
        /-------------------------------------------------------------
        */

        //verificando se o usuário logado consegue acessar a rota ver os computadores salvos
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        //verificando se o usuário esta autenticado
        $this->assertAuthenticated();
        
        //mandando a requisição
        $response = $this->get('/computadores');

        //verificando o código de resposta
        $response->assertStatus(200);
    }

// ----------------------------------------------------------------------

    public function test_PáginaDeEditarComputador() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a página de editar de computadores;
        /-------------------------------------------------------------
        */

        //criando um usuário falso
        $user = User::factory()->create();

        //passando dados falsos
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        //verificando se o usuário esta autenticado 
        $this->assertAuthenticated();

        //criando um livro falso
        $computador = Computadore::create([
            'identificacao_comp'=>"12",      
        ]);
        
        //enviando requisição
        $response =  $this->get('/computador/edit/'.$computador->id);

        //código de resposta esperado
        $response->assertStatus(200);
    }

// ----------------------------------------------------------------------

    public function test_AtualizarComputadorUsuarioNaoLogado() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a atualização de computadores com usuário não logado;
        /-------------------------------------------------------------
        */


         //---------------------------------------------- Parte do teste que loga usuário
        // //criando um usuário falso
        // $user = User::factory()->create();
        // //passando dados falsos
        // $response = $this->post('/login', [
        //     'email' => $user->email,
        //     'password' => 'password',
        // ]);
        //-----------------------------------------------------------------------------------


        //verificando se o usuário esta autenticado 
        $this->assertAuthenticated();
        
        //criando livro falso
        $comp = Computadore::create([
            'identificacao_comp'=>"12",      
        ]);
        
        //Computador atualizado
        $compAtualizado=[
            'identificacao_comp'=>"12",      
        ];
        
        //mandando a requisição
        $response2 = $this->post('/computador/update/'.$comp->id, $compAtualizado);

        //verificando se os dados existem no banco
        $this->assertDatabaseHas('computadores', $compAtualizado);

        //verificando se a página foi redirecionada
        $response2->assertStatus(302);

        //verificando se foi redirecionada para a página esperada
        $response2->assertRedirect('/computadores');
    }

// ----------------------------------------------------------------------

    public function test_AtualizarComputadorUsuarioLogado() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a atualização de computadores com usuário logado;
        /-------------------------------------------------------------
        */

        //criando um usuário falso
        $user = User::factory()->create();

        //passando dados falsos
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        //verificando se o usuário esta autenticado 
        $this->assertAuthenticated();
        
        //criando livro falso
        $comp = Computadore::create([
            'identificacao_comp'=>"12",      
        ]);
        
        //Computador atualizado
        $compAtualizado=[
            'identificacao_comp'=>"12",      
        ];
        
        //mandando a requisição
        $response2 = $this->post('/computador/update/'.$comp->id, $compAtualizado);

        //verificando se os dados existem no banco
        $this->assertDatabaseHas('computadores', $compAtualizado);

        //verificando se a página foi redirecionada
        $response2->assertStatus(302);

        //verificando se foi redirecionada para a página esperada
        $response2->assertRedirect('/computadores');
    }

    //----------------------------------------------------------------------

    public function test_DeletarComputador() // -- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a remoção do computadore;
        /-------------------------------------------------------------
        */

        //criando um usuário falso
        $user = User::factory()->create();

        //passando dados falsos
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        //verificando se o usuário esta autenticado 
        $this->assertAuthenticated();
        
        //criando computador falso
        $comp = Computadore::create([
            'identificacao_comp'=>"12",      
        ]);
        
        //enviando requisição
        $response2 = $this->post('/computador/remove/'.$comp->id);

        //procurando esse computador no banco de dados
        $this->assertDatabaseMissing('computadores', ['id' => $comp->id]);

        //código de resposta esperado
        $response2->assertStatus(302);

        //verificando se foi redirecionada para a página esperada
        $response2->assertRedirect('/computadores');
    }

//----------------------------------------------------------------------

}
