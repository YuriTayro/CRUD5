<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $sql = $pdo->prepare("SELECT*FROM usuarios2 WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {

        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {

        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

//echo print_r($info);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <!-- Incluindo os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Editar Usuário</h1>

    <form action="editar_action.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $info['id'] ?>" />

        <label  class="form-label">NOME:</label>
        <input type="text"  name="name" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" style="width: 250px;" value="<?php echo $info['nome'] ?>">


        <label  class="form-label">SENHA:</label>
        <input type="email"  name="email" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" style="width: 250px;" value="<?php echo $info['email'] ?>">


        <label for="inputPassword5" class="form-label">SENHA:</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="senha" style="width: 250px;">
        <div id="passwordHelpBlock" class="form-text">
            <!--Lembrar de fazer uma trava de senha futuramente -->
        </div>

        <input type="submit" value="Adicionar">
    </form>

    <!-- Incluindo os arquivos JavaScript do Bootstrap (opcional, dependendo das funcionalidades que você planeja usar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>