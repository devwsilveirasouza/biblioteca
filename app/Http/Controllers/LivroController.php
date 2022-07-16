<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    protected $livro;

    public function __construct(Livro $livro)
    {
        $this->livro = $livro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtém todos os livros cadastrados
        $livros = Livro::all();

        // Direciona para a view e fornece um vetor
        // contendo os livros
        return view('livros.index')
            ->with(['livros' => $livros]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostra a view para cadastrar um livro
        return view('livros.create');
    }
    /* Recebe as informações do formulário e grava no banco de dados */
    // Desenvolver a validação da tipagem dos dados
    // Está dadno erro neste metodo
    public function store(LivroRequest $request)
    {
        // Valida os dados vindo do formulário
           /* $request->validate([
            'titulo' => 'required',
           'autor' => 'required',
           'paginas' => 'required'
            ],
            ['titulo.required' => 'Digite um titulo',
            'autor.required' => 'Digite um autor',
            'paginas.required' => 'Digite o numero de paginas'
        ]);*/
        // Cadastra o livro na tabela do banco de dados
        Livro::create($request->all());
        // Redireciona para a página de listagem
        //return redirect()->route('livros.index')->with('mensagem', 'Livro salvo som sucesso.');
        // Retorna para página de cadastro com mensagem de sucesso
        return back()->with('mensagem', 'Livro cadastrado com sucesso!');

    }
    // Mostrar detalhes do livro
    public function show(Livro $livro)
    {
        return view('livros.show')
            ->with(['livro' => $livro]);// este padrão poder ser usado com vários parametros

    }

    // Metodo que permite excluir um livro
    public function destroy(Livro $livro)
        // Chamando o metodo delete() do Eloquent
        {
        $livro->delete();
        // Retorna a página com uma mensagem de sucesso
        return back()->with('mensagem', 'Livro excluido com sucesso');
        }
        // Metodo que permite editar um livro
    public function edit(Livro $livro)
    {
        // Chama a view e passa o livro para ela
        return view('livros.edit')
            ->with(['livro' => $livro]);
    }
        // Permite atualizar os dados de um livro
    public function update(Request $request, Livro $livro)
    {
        // Valida os dados vindo do formulário
        $request->validate([
            'titulo' => 'required',
           'autor' => 'required',
           'paginas' => 'required'
            ],
            ['titulo.required' => 'Digite um titulo',
            'autor.required' => 'Digite um autor',
            'paginas.required' => 'Digite o numero de paginas'
        ]);

        // Atualiza o livro na tabela do banco de dados
        $livro -> update($request->all());

        // Retorna para a rota "livros.index" com a mensagem livro atualizado com sucesso
        return redirect()->route('livros.index')
            ->with('mensagem', 'Livro atualizado com sucesso.');
    }

}
