<?php
include 'database.php';

$id     = $_POST['id'];
$titulo = $_POST['titulo'];
$autor  = $_POST['autor'];
$ano    = $_POST['ano'];

$stmt = $db->prepare("UPDATE livros SET titulo=?, autor=?, ano=? WHERE id=?");
$stmt->execute([$titulo, $autor, $ano, $id]);

header("Location: index.php");
exit;
