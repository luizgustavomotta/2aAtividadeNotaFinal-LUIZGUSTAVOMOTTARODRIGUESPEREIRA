<?php
include 'database.php';

$descricao = $_POST['descricao'];
$vencimento = $_POST['vencimento'];

$db->exec("INSERT INTO tarefas (descricao, vencimento) VALUES ('$descricao', '$vencimento')");

header("Location: index.php");
exit;
?>