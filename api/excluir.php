<?php
require '../conexao.php';

header('Content-Type: application/json');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(['error' => 'ID não fornecido.']);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id]);
    echo json_encode(['success' => 'Usuário excluído com sucesso.']);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao excluir usuário: ' . $e->getMessage()]);
}
?>
