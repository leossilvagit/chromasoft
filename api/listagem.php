<?php
require '../conexao.php';

header('Content-Type: application/json');

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("SELECT id, nome, email FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        echo json_encode($usuario);
    } else {
        echo json_encode(['error' => 'Usuário não encontrado.']);
    }
} else {
    $stmt = $pdo->query("SELECT id, nome, email FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($usuarios);
}
?>
