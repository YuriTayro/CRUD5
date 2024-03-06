<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = password_hash($_POST['senha'], PASSWORD_BCRYPT);

if($name && $email && $password ){


    $sql = $pdo -> prepare("SELECT * FROM usuarios2 WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){

        $sql = $pdo->prepare("INSERT INTO usuarios2 (nome, email, senha) VALUES (:name, :email, :senha)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $password);
        $sql->execute();

        header("Location: index.php");
    }else{
        header("Location: adicionar.php");
        exit;
    }

} else {
    header("Location: adicionar.php");
    exit;
}