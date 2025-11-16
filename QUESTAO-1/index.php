<?php
include 'database.php';
$livros = $db->query("SELECT * FROM livros ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #121212;
            margin: 0;
            padding: 20px;
            color: #e5e5e5;
        }

        .container {
            max-width: 850px;
            background: #1e1e1e;
            padding: 25px;
            border-radius: 12px;
            margin: auto;
            box-shadow: 0px 4px 25px rgba(0,0,0,0.4);
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 25px;
        }

        a.btn {
            display: inline-block;
            padding: 10px 16px;
            background: #3d6ef7;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        a.btn:hover {
            background: #2d54c9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            color: #ddd;
        }

        th, td {
            padding: 12px 10px;
            text-align: left;
        }

        th {
            background: #2a2a2a;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #181818;
        }

        tr:nth-child(odd) {
            background: #202020;
        }

        .delete-btn {
            background: #c62828;
            color: #fff;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
        }

        .delete-btn:hover {
            background: #891c1c;
        }

        .edit-btn {
            background: #00796b;
            color: #fff;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px
        }

        .edit-btn:hover {
            background: #005f53

        }
    </style>
</head>
<body>

<div class="container">
    <h1>Livraria</h1>

    <a href="add_book.php" class="btn">Adicionar Livro</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($livros as $livro): ?>
            <tr>
                <td><?= $livro['id'] ?></td>
                <td><?= htmlspecialchars($livro['titulo']) ?></td>
                <td><?= htmlspecialchars($livro['autor']) ?></td>
                <td><?= $livro['ano'] ?></td>
                <td>
                    <a class="delete-btn" href="delete_book.php?id=<?= $livro['id'] ?>" onclick="return confirm('Deseja realmente excluir este livro?')">Excluir</a>

                    <a class="edit-btn" href="edit_book.php?id=<?= $livro['id'] ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
