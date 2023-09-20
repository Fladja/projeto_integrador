<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Sala;

class SalasTest extends TestCase
{
    use RefreshDatabase;

    public function test_PáginaDeRegistroDeSala() //-- OK
    {
       /*
       /-------------------------------------------------------------
       /Este teste avalia a página cadastro de salas;
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
        $response = $this->get('/salas/create');
        
        //código esperado para esta requisição;
        $response->assertStatus(200);
   }

// ----------------------------------------------------------------------

   public function test_RegistroDeSalas() //-- OK
   {
       /*
       /-------------------------------------------------------------
       /Este teste avalia o registro de salas;
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
           'numero'=>"12",      
       ];
       
       //acessando a rota de adicionar computadores no banco
       $response2 = $this->post('/salas/create',$data); 

       //verificando se os dados foram inseridos
       $this->assertDatabaseHas('salas', $data);

       //rota esperada após a inserção no banco
       $response2->assertRedirect('/salas');
       
       //código de resposta esperado
       $response2->assertStatus(302);
   }

// ----------------------------------------------------------------------

   public function test_ListarSalas()  //-- OK
   {
       /*
       /-------------------------------------------------------------
       /Este teste avalia o acesso a página de salas salvos;
       /-------------------------------------------------------------
       */

       //verificando se o usuário logado consegue acessar a rota ver os salas salvos
       $user = User::factory()->create();//criando um usuário falso

       $response = $this->post('/login', [//passando dados falsos
           'email' => $user->email,
           'password' => 'password',
       ]);

       //verificando se o usuário esta autenticado
       $this->assertAuthenticated();
       
       //mandando a requisição
       $response = $this->get('/salas');

       //verificando o código de resposta
       $response->assertStatus(200);
   }

// ----------------------------------------------------------------------

   public function test_PáginaDeEditarSalas() //-- OK
   {
       /*
       /-------------------------------------------------------------
       /Este teste avalia a página de editar de salas;
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
       $sala = Sala::create([
           'numero'=>"11",      
       ]);
       
       //enviando requisição
       $response =  $this->get('/salas/edit/'.$sala->id);

       //código de resposta esperado
       $response->assertStatus(200);
   }

// ----------------------------------------------------------------------


    public function test_AtualizarSalas() //-- OK
    {
    /*
    /-------------------------------------------------------------
    /Este teste avalia a atualização de salas;
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
    
    //criando uma sala falsa
    $salas = Sala::create([
        'numero'=>"15",      
    ]);
    
    //Sala atualizado
    $salaAtualizado=[
        'numero'=>"12",      
    ];
    
    //mandando a requisição
    $response2 = $this->post('/salas/update/'.$salas->id, $salaAtualizado);

    //verificando se os dados existem no banco
    $this->assertDatabaseHas('salas', $salaAtualizado);

    //verificando se a página foi redirecionada
    $response2->assertStatus(302);

    //verificando se foi redirecionada para a página esperada
    $response2->assertRedirect('/salas');
    }

//----------------------------------------------------------------------

   public function test_DeletarSalasUsuarioLogado() // -- OK
   {
       /*
       /-------------------------------------------------------------
       /Este teste avalia a remoção de sala com usuário logado;
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
       
       //criando uma sala falsa
       $sala = Sala::create([
           'numero'=>"19",      
       ]);
       
       //enviando requisição
       $response2 = $this->post('/salas/remove/'.$sala->id);

       //procurando esse computador no banco de dados
       $this->assertDatabaseMissing('salas', ['id' => $sala->id]);

       //código de resposta esperado
       $response2->assertStatus(302);

       //verificando se foi redirecionada para a página esperada
       $response2->assertRedirect('/salas');
   }
   
//----------------------------------------------------------------------

    public function test_DeletarSalasUsuarioNaoLogado() // -- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a remoção de sala com usuário não logado;
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
        
        //criando uma sala falsa
        $sala = Sala::create([
            'numero'=>"19",      
        ]);
        
        //enviando requisição
        $response2 = $this->post('/salas/remove/'.$sala->id);

        //procurando esse computador no banco de dados
        $this->assertDatabaseMissing('salas', ['id' => $sala->id]);

        //código de resposta esperado
        $response2->assertStatus(302);

        //verificando se foi redirecionada para a página esperada
        $response2->assertRedirect('/salas');
    }

//----------------------------------------------------------------------
}
