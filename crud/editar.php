<?php
// Receber o ID do contato a ser editado
$id = intval($_GET['id']);

// Conectar ao banco de dados
$conexao = new mysqli('localhost', 'root', 'root', 'agenda_db');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Consultar o contato pelo ID usando prepared statement
$stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar se o contato existe
if ($resultado->num_rows > 0) {
    $contato = $resultado->fetch_assoc();
} else {
    die("Contato não encontrado.");
}

$stmt->close();
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
</head>
<body class="container">
    <h1 class="my-5">Editar Contato</h1>
    <form action="salvar.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($contato['id']) ?>">
        <div class="form-group mb-3">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?= htmlspecialchars($contato['nome']) ?>">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="fone">Fone:</label>
            <input class="form-control" type="tel" name="fone" id="fone" value="<?= htmlspecialchars($contato['fone']) ?>">
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
