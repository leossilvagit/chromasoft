<?php
require '../conexao.php';

$data = json_decode(file_get_contents('php://input'), true);

$nome = $data['nome'] ?? '';
$email = $data['email'] ?? '';
$senha = $data['senha'] ?? '';

if (strlen($senha) < 6) {
    echo json_encode(['error' => 'A senha deve ter pelo menos 6 caracteres.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => password_hash($senha, PASSWORD_DEFAULT)
    ]);
    echo json_encode(['success' => 'Usuário cadastrado com sucesso.']);
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo json_encode(['error' => 'E-mail já cadastrado.']);
    } else {
        echo json_encode(['error' => 'Erro ao cadastrar usuário.']);
    }
}
?>
