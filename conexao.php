<?php
$host = 'localhost';
$db = 'chromasoft';
$user = 'root';
$pass = 'gate_pos';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Remova qualquer saída aqui, como "Conexão bem-sucedida!"
} catch (PDOException $e) {
    die(json_encode(['error' => 'Erro na conexão: ' . $e->getMessage()]));
}
?>
