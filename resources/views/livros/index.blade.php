<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <title>Biblioteca</title>
</head>
<body>
<h1>Livros Cadastrados</h1>

@if ($status = Session::get('mensagem'))
    <h2> {{ $status }} </h2>
@endif

<h4><a href="{{route('livros.create')}}">Cadastrar Novo Livro</a></h4>

<table width="709" border="1" cellspacing="0" cellpadding="3">
    <tr>
        <td width="85" align="center"><strong>Id</strong></td>
        <td width="161" align="center"><strong>Título</strong></td>
        <td width="156" align="center"><strong>Autor</strong></td>
        <td width="98" align="center"><strong>Páginas</strong></td>
        <td width="167" align="center"><strong>Opções</strong></td>
    </tr>

    @foreach($livros as $livro)
        <tr>
            <td align="center">{{ $livro -> id }}</td>
            <td>{{ $livro -> titulo }}</td>
            <td>{{ $livro -> autor }}</td>
            <td align="center">{{ $livro -> paginas }}</td>
            <td align="center">

                <form action="{{ route('livros.destroy', ['livro' => $livro -> id])}}" method="post">
                    <a href="{{route('livros.show', $livro -> id)}}">Detalhes</a> |
                    <a href="{{route('livros.edit', $livro -> id)}}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>

</body>
</html>
