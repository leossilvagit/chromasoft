<?php
require '../conexao.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'] ?? null;
$nome = $data['nome'] ?? null;
$email = $data['email'] ?? null;

if (!$id || !$nome || !$email) {
    echo json_encode(['error' => 'Todos os campos são obrigatórios.']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
    $stmt->execute([
        ':id' => $id,
        ':nome' => $nome,
        ':email' => $email
    ]);
    echo json_encode(['success' => 'Usuário atualizado com sucesso.']);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao atualizar o usuário: ' . $e->getMessage()]);
}
?>
