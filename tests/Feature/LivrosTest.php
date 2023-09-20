<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Livro;

class LivrosTest extends TestCase
{
    use RefreshDatabase;
    //identificar as necessidades
    //suprir a necessidade
    //montar o teste
    //rodar o teste
    //aqui eu tenho que montar oq eu espero que aconteça

     public function test_PáginaDeRegistroDeLivro() //-- OK
     {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a página cadastro de livros;
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
         $response = $this->get('/livros/create');
         
         //código esperado para esta requisição;
         $response->assertStatus(200);
    }

// ----------------------------------------------------------------------

    public function test_RegistroDeLivroUsuarioLogado() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia o registro de livros com usuário logado;
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
            'autor'=>"Teste",
            'publicacao'=>"Teste",
            'nome'=>"Teste",
            'genero'=>"Teste",
            'categoria'=>"Teste"        
        ];
        
        //acessando a rota de adicionar livros no banco
        $response2 = $this->post('/livros/create',$data); 

        //verificando se os dados foram inseridos
        $this->assertDatabaseHas('livros', $data);

        //rota esperada após a inserção no banco
        $response2->assertRedirect('/livros');
        
        //código de resposta esperado
        $response2->assertStatus(302);
    }

// ----------------------------------------------------------------------

    public function test_RegistroDeLivroUsuarioNaoLogado() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia o registro de livros com usuário não logado;
        /-------------------------------------------------------------
        */


        //---------------------------------------------- Parte do teste que loga usuário
        // //criando um usuário falso
        // $user = User::factory()->create();
        // //passando dados falsos
        // $response1 = $this->post('/login', [
        //     'email' => $user->email,
        //     'password' => 'password',
        // ]);
        //-----------------------------------------------------------------------------------


        //verificando se o usuário esta aunteticado
        $this->assertAuthenticated();

        //dados simulados
        $data = [
            'autor'=>"Teste",
            'publicacao'=>"Teste",
            'nome'=>"Teste",
            'genero'=>"Teste",
            'categoria'=>"Teste"        
        ];
        
        //acessando a rota de adicionar livros no banco
        $response2 = $this->post('/livros/create',$data); 

        //verificando se os dados foram inseridos
        $this->assertDatabaseHas('livros', $data);

        //rota esperada após a inserção no banco
        $response2->assertRedirect('/livros');
        
        //código de resposta esperado
        $response2->assertStatus(302);
}

// ----------------------------------------------------------------------

    public function test_ListarLivros()  //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia o acesso a página de livros salvos;
        /-------------------------------------------------------------
        */

        //verificando se o usuário logado consegue acessar a rota ver os livros salvos
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        //verificando se o usuário esta autenticado
        $this->assertAuthenticated();
        
        //mandando a requisição
        $response = $this->get('/livros');

        //verificando o código de resposta
        $response->assertStatus(200);
    }

// ----------------------------------------------------------------------

    public function test_PáginaDeEditarLivro() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a página de editar de livros;
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
        $livro = Livro::create([
            'autor'=> "teste",
            'publicacao'=>"teste",
            'nome'=>"teste",
            'genero'=>"teste",
            'categoria'=>"teste",
        ]);
        
        //enviando requisição
        $response =  $this->get('/livros/edit/'.$livro->id);

        //código de resposta esperado
        $response->assertStatus(200);
    }

// ----------------------------------------------------------------------

    public function test_AtualizarLivro() //-- OK
    {
        /*
        /-------------------------------------------------------------
        /Este teste avalia a atualização de livro;
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
        $livro = Livro::create([
            'autor'=> "teste",
            'publicacao'=>"teste",
            'nome'=>"teste",
            'genero'=>"teste",
            'categoria'=>"teste",
        ]);
        
        //livro atualizado
        $livroAtualizado=[
            'autor'=> "teste",
            'publicacao'=>"teste",
            'nome'=>"teste",
            'genero'=>"teste",
            'categoria'=>"teste",
        ];
        
        //mandando a requisição
        $response2 = $this->post('/livros/update/'.$livro->id, $livroAtualizado);

        //verificando se os dados existem no banco
        $this->assertDatabaseHas('livros', $livroAtualizado);

        //verificando se a página foi redirecionada
        $response2->assertStatus(302);

        //verificando se foi redirecionada para a página esperada
        $response2->assertRedirect('/livros');
    }

//----------------------------------------------------------------------

public function test_DeletarLivro() // -- OK
{
    /*
    /-------------------------------------------------------------
    /Este teste avalia a remoção do livro;
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
    $livro = Livro::create([
        'autor'=> "teste",
        'publicacao'=>"teste",
        'nome'=>"teste",
        'genero'=>"teste",
        'categoria'=>"teste",
    ]);

    //enviando requisição'
    $response2 = $this->post('/livros/remove/'.$livro->id);

    //procurando esse livro no banco de dados
    $this->assertDatabaseMissing('livros', ['id' => $livro->id]);

    //código de resposta esperado
    $response2->assertStatus(302);

    //verificando se foi redirecionada para a página esperada
    $response2->assertRedirect('/livros');
}

// ----------------------------------------------------------------------

}
