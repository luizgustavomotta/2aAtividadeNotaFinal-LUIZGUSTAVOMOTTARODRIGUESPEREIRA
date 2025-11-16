<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $excluir = $db->prepare("DELETE FROM livros WHERE id = ?");
    $excluir->execute([$id]);
}

header("Location: index.php");
exit;
?>
