<?php
// Receber os dados do formulário
$nome = $_POST['nome'];
$fone = $_POST['fone'];

// Conectar ao banco de dados
$conexao = new mysqli('localhost', 'root', 'root', 'agenda_db');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Inserir ou atualizar os dados na tabela contatos usando prepared statement
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conexao->prepare("UPDATE contatos SET nome = ?, fone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nome, $fone, $id);
} else {
    $stmt = $conexao->prepare("INSERT INTO contatos (nome, fone) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $fone);
}

$stmt->execute();
$stmt->close();
$conexao->close();

// Redirecionar para a página inicial
header('Location: index.php');
exit;
?>
