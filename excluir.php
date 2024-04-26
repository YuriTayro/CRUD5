<?php
require 'config.php';

//Pegar o campo id
$id = filter_input(INPUT_GET, 'id');

//Deletar o campo pelo seu id
if($id){
    $sql = $pdo->prepare("DELETE FROM usuarios2 WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}

header("Location: index.php");
exit;


