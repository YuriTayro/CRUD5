<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['senha']; // A senha será usada apenas se for fornecida uma nova senha

// Verificar se os campos obrigatórios são válidos
if($id && $name && $email){
    // Construir a query de atualização
    $sql = "UPDATE usuarios2 SET nome = :nome, email = :email";
    // Adicionar a atualização da senha apenas se uma nova senha for fornecida
    if(!empty($password)){
        $sql .= ", senha = :senha";
        $password = password_hash($password, PASSWORD_BCRYPT);
    }
    $sql .= " WHERE id = :id";

    // Preparar e executar a query
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $name);
    $stmt->bindValue(':email', $email);
    if(!empty($password)){
        $stmt->bindValue(':senha', $password);
    }
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
} else {
    header("Location: adicionar.php");
    exit;
}
?>
