<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <title>Biblioteca</title>
</head>
<body>

<h1>Atualizar Livro</h1>
<!-- Verifica se houve erro e retorna a mensagem do erro -->
@if ($errors->any())
    <h2> Houve alguns erros ao processar o formulário </h2>
    <ul>
        @foreach ( $errors->all() as $error )
            <li> {{ $error }} </li>
        @endforeach
    </ul>
@endif

<form action=" {{ route('livros.update', $livro -> id) }} " method="post">
    @csrf
    @method('PUT')

    <table width="200" border="0" cellspacing="3" cellpadding="3">
        <tr>
            <td>Título</td>
            <td><input type="text" value="{{$livro -> titulo}}" name="titulo" id="titulo" placeholder="Título"></input></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type="text" value="{{$livro -> autor}}" name="autor" id="autor" placeholder="Autor"></input></td>
        </tr>
        <tr>
            <td>Página</td>
            <td><input type="text" size="10" value="{{$livro -> paginas}}" name="paginas" id="paginas" placeholder="Quant. Páginas"></input></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="submit">Salvar alterações</button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
