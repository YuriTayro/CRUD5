<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id){

    $sql = $pdo->prepare("SELECT*FROM usuarios2 WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount()>0) {

        $info = $sql->fetch(PDO::FETCH_ASSOC);


    }else{

        header("Location: index.php");
        exit;

    }

}else{
    header("Location: index.php");
    exit;
}

echo print_r($info);

?>


<h1>Editar Usuário</h1>

<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <label>
        NOME:<br>
        <input type="text" name="name" value="<?php echo $info['nome']?>" />
    </label><br><br>
    <label>
        E-MAIL:<br>
        <input type="email" name="email" value="<?php echo $info['email']?>"/>
    </label><br><br>
    <label>
        SENHA:<br>
        <input type="password" name="senha">
    </label><br><br>
    <input type="submit" value="Adicionar">
</form>