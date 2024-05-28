<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
</head>
<body class="container">
    <h1 class="my-5">Novo Contato</h1>
    <form action="salvar.php" method="post">
        <div class="form-group mb-3">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="fone">Fone:</label>
            <input class="form-control" type="tel" name="fone" id="fone">
        </div>
        <div>
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-floppy2-fill"></i> Salvar
            </button>
            <button class="btn btn-danger" type="reset">
                <i class="bi bi-pencil-square"></i> Limpar
            </button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
