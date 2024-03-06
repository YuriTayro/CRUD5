<?php

require '../config.php';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
if ($pdo) {
    echo "Conectado com sucesso ao banco de dados!";
} else {
    echo "Erro ao conectar ao banco de dados.";
}
