<?php
include 'database.php';

$id = $_GET['id'];

$db->exec("DELETE FROM tarefas WHERE id = $id");

header("Location: index.php");
exit;
?>
