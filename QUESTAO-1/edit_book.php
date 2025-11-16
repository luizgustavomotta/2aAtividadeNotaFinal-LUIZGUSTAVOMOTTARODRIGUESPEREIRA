<?php
include 'database.php';

if (!isset($_GET['id'])) {
    die("ID do livro não informado.");
}

$id = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livro) {
    die("Livro não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Livro</title>
<style>
    body {
        background: #121212;
        color: #e5e5e5;
        font-family: Arial;
        padding: 20px;
    }
    .container {
        max-width: 500px;
        background: #1e1e1e;
        padding: 20px;
        border-radius: 12px;
        margin: auto;
    }
    input, button {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border-radius: 6px;
        border: none;
    }
    button {
        background: #3d6ef7;
        color: white;
        cursor: pointer;
    }
    button:hover {
        background: #2d54c9;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Editar Livro</h2>

    <form action="update_book.php" method="POST">
        <input type="hidden" name="id" value="<?= $livro['id'] ?>">

        <label>Título:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>

        <label>Autor:</label>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>

        <label>Ano:</label>
        <input type="number" name="ano" value="<?= $livro['ano'] ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
</div>

</body>
</html>
