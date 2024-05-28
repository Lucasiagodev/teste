<?php
// Receber o ID do contato a ser removido
$id = intval($_GET['id']);

// Conectar ao banco de dados
$conexao = new mysqli('localhost', 'root', 'root', 'agenda_db');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Remover o contato pelo ID usando prepared statement
$stmt = $conexao->prepare("DELETE FROM contatos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conexao->close();

// Redirecionar para a página inicial
header('Location: index.php');
exit;
