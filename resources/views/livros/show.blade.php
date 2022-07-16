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

    <style>
        a {
            color: blue
        }

    </style>

</head>
<body>
<h1>Detalhes do livro</h1>

<table width="500" border="1" cellspacing="0" cellpadding="3">
    <tr>
        <td><strong>Id</strong></td>
        <td>{{ $livro -> id }}</td>
    </tr>
    <tr>
        <td><strong>Título</strong></td>
        <td>{{ $livro -> titulo }}</td>
    </tr>
    <tr>
        <td><strong>Autor</strong></td>
        <td>{{ $livro -> autor }}</td>
    </tr>
    <tr>
        <td><strong>Páginas</strong>
        <td>{{ $livro -> paginas }}</td>
    </tr>

</table>

</body>
</html>
