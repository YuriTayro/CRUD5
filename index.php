<?php
//Read do crud
require 'config.php';

$lista = [];

$sql = $pdo->prepare("SELECT id, nome, email FROM usuarios2");

if ($sql->execute()) { // Verifica se a consulta foi executada com sucesso
    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Nenhum registro encontrado.";
    }
} else {
    echo "Erro ao executar a consulta.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página PHP com Bootstrap</title>

    <!-- Incluindo os arquivos CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Incluindo os arquivos JavaScript do Bootstrap (opcional, dependendo das funcionalidades que você planeja usar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Conteúdo da sua página PHP aqui -->
    <h1>Tabela com os dados cadastrados no banco de dados</h1>
    <br>
    <br>
    <p>Adicionar um novo usuário? <a href="adicionar.php">clique aqui!</a></p>
    <br>

    <table class="table" border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>AÇÕES</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($lista as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id'] ?></td>
                    <td><?php echo $usuario['nome'] ?></td>
                    <td><?php echo $usuario['email'] ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $usuario['id'] ?>">[ Editar ]</a>
                        <a href="excluir.php?id=<?php echo $usuario['id'] ?>">[ Excluir ]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot></tfoot>

    </table>
</body>

</html>
