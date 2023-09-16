<?php

namespace Tests\Feature\Book;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 
use App\Models\User;
use App\Models\Book;

class LivrosTest extends TestCase
{
    use RefreshDatabase;

    public function test_PáginaDeRegistroDeLivroUsuarioLogado()
    {
        //Aqui estou acessar a página de cadastro de livros com o usuario logado
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/livros/create');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    public function test_PáginaDeRegistroDeLivroUsuarioNaoLogado()
    {
        //Aqui estou tentando acessar a página de cadastro de livro com o usuário não logado
        $response = $this->get('/livros/create');//tetando acessar a página
        $this->assertAuthenticated();//verificando se o usuário esta logado
    }

// ----------------------------------------------------------------------

    public function test_RegistroDeLivroUsuarioLogado()
    {
        //Aqui estou testando se o usuário logado consegue armazenar um novo livro

        //Aqui estou acessar a página de cadastro de livros com o usuario logado
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->post('/livros/create', [//passando dados falsos
            'autor'=>"Teste",
            'publicacao'=>"Teste",
            'nome'=>"Teste",
            'genero'=>"Teste",
            'categoria'=>"Teste"
        ]);

        $this->assertAuthenticated();//verificando se o usuário esta aunteticado
    }

    public function test_RegistroDeLivroUsuarioNaoLogado()
    {
        //Aqui estou testando se o usuário não cadastrado consegue armazenar um novo livro
        $response = $this->post('/livros/create', [//passando dados falsos
            'autor'=>"Teste",
            'publicacao'=>"Teste",
            'nome'=>"Teste",
            'genero'=>"Teste",
            'categoria'=>"Teste"
        ]);

        $this->assertAuthenticated();//verificando se o usuário esta aunteticado
    }

// ----------------------------------------------------------------------

    public function test_ListarLivrosUsuarioLogado()
    {
        //verificando se o usuário logado consegue acessar a rota ver os livros salvos
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->get('/livros');
        $this->assertAuthenticated();//verificando se o usuário esta autenticado
    }

    public function test_ListarLivrosUsuarioNaoLogado()
    {
        //Aqui estou testando se o usuário não logado consegue ver os livros
        $this->get('/livros');
        $this->assertAuthenticated();//verificando se o usuário esta aunteticado
    }

// ----------------------------------------------------------------------

    public function test_PáginaDeEditarLivroUsuarioLogado()
    {
        //Aqui estou acessar a página de editar livros com o usuario logado
        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        $response =  $this->get('/livros/edit');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado 
    }

    public function test_PáginaDeEditarLivroUsuarioNaoLogado()
    {
        //Aqui estou acessar a página de editar livros com o usuario nao logado
        $response =  $this->get('/livros/edit');//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado 
    }

// ----------------------------------------------------------------------

    public function test_AtualizarLivroUsuarioLogado()
    {
        //Aqui estou a atualizar o livro com o usuario logado

        $user = User::factory()->create();//criando um usuário falso

        $response = $this->post('/login', [//passando dados falsos
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        $response = $this->post('/livros/update',[
            'id'=> 1,
            'autor'=> "Teste",
            'publicacao'=>"Teste",
            'nome'=>"Teste",
            'genero'=>"Teste",
            'categoria'=>"Teste"
        ]);//enviando requisição

        $this->assertAuthenticated();//verificando se o usuário esta autenticado 
    }

    public function test_AtualizarLivroUsuarioNaoLogado()
    {
        //Aqui estou a atualizar o livro com o usuario não logado

        $response = $this->post('/livros/update',[
            'id'=> 1,
            'autor'=> "Teste",
            'publicacao'=>"Teste",
            'nome'=>"Teste",
            'genero'=>"Teste",
            'categoria'=>"Teste"
        ]);//enviando requisição


        $this->assertAuthenticated();//verificando se o usuário esta autenticado 
    }

//----------------------------------------------------------------------

public function test_DeletarLivroUsuarioLogado()
{
    //Aqui estou a deletar o livro com o usuario logado

    $user = User::factory()->create();//criando um usuário falso

    $response = $this->post('/login', [//passando dados falsos
        'email' => $user->email,
        'password' => 'password',
    ]);
    
    $response = $this->post('/livros/remove',['id'=>1]);//enviando requisição

    $this->assertAuthenticated();//verificando se o usuário esta autenticado 
}

public function test_DeletarLivroUsuarioNaoLogado()
{
    //Aqui estou a deletar o livro com o usuario não logado

    $response = $this->post('/livros/remove',['id'=>1]);//enviando requisição

    $this->assertAuthenticated();//verificando se o usuário esta autenticado 
}

//----------------------------------------------------------------------

}
