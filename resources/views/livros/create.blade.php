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

    <div class="container mt-5">
        <h1>Novo Livro</h1>
        <!--  Recebe a mensagem de status da operação  -->
        @if ($status = Session::get('mensagem'))
            <h2> {{ $status }} </h2>
        @endif
        <!-- Form validate -->
        @if ($errors->any())
            <h2> Houve alguns erros ao processar o formulário </h2>
        @endif
        <!-- End Form validate - 24/02/2022 -->
        <form action=" {{ route('livros.store') }} " class="formulario-cadastrar" method="post">
            @csrf
            <table width="200" border="0" cellspacing="3" cellpadding="3">
                <tr>
                    <td>Título</td>
                    <td><input type="text" name="titulo" id="titulo" placeholder="Título"></td>
                    @if ($errors->has('titulo'))
                        <h6> Favor preencher o título </h6>
                    @endif
                </tr>
                <tr>
                    <td>Autor</td>
                    <td><input type="text" name="autor" id="autor" placeholder="Autor"></td>
                    @if ($errors->has('autor'))
                        <h6> Favor preencher o autor </h6>
                    @endif
                </tr>
                <tr>
                    <td>Página</td>
                    <td><input type="text" size="10" name="paginas" id="paginas"
                            placeholder="Quantidade de Páginas"></td>
                    @if ($errors->has('paginas'))
                        <h6> Favor preencher o número de páginas </h6>
                    @endif
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><button type="submit">Gravar</button></td>
                </tr>
            </table>
        </form>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $('.formulario-cadastrar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();

                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })

        });
    </script>

</body>

</html>
