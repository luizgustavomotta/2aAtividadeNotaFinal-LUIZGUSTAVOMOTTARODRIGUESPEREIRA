<?php
include 'database.php';

$id = $_GET['id'];

$db->exec("UPDATE tarefas SET concluida = 1 WHERE id = $id");

header("Location: index.php");
exit;
?>
