<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    $insert = $db->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (?, ?, ?)");
    $insert->execute([$titulo, $autor, $ano]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
    <style>
        body {
            font-family: Arial;
            background: #121212;
            padding: 20px;
            color: #e5e5e5;
        }

        .form-box {
            max-width: 500px;
            margin: auto;
            background: #1e1e1e;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 25px rgba(0,0,0,0.4);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #ccc;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #555;
            background: #2b2b2b;
            color: #e5e5e5;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3d6ef7;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #2d54c9;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #7ca7ff;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Adicionar Livro</h2>

    <form method="POST">
        <label>Título</label>
        <input type="text" name="titulo" required>

        <label>Autor</label>
        <input type="text" name="autor" required>

        <label>Ano</label>
        <input type="number" name="ano">

        <button type="submit">Salvar</button>
    </form>

    <a href="index.php">Voltar</a>
</div>

</body>
</html>
