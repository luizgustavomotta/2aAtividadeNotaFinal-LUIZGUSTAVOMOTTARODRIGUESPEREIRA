<?php 
include 'database.php';

$pendentes = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY vencimento");
$concluidas = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY vencimento");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>

    <style>
        body {
            background: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px 0;
        }

        .container {
            width: 800px;
            margin: auto;
            background: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px #000;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        input {
            flex: 1;
            padding: 8px;
            background: #333;
            border: 1px solid #555;
            border-radius: 5px;
            color: #fff;
        }

        button {
            padding: 8px 15px;
            background: #007bff;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #222;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-top: 1px solid #333;
        }

        tr:nth-child(even) {
            background: #181818;
        }

        .btn-verde {
            background: #0f8;
            padding: 5px 10px;
            border-radius: 5px;
            color: #000;
            text-decoration: none;
            margin-right: 5px;
        }

        .btn-vermelho {
            background: #f33;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        .separador {
            margin: 30px 0 10px;
            font-size: 20px;
            border-bottom: 1px solid #555;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="container">

<h1>Gerenciador de Tarefas
    PlayToy Park
</h1>

<form action="add_tarefa.php" method="POST">
    <input type="text" name="descricao" placeholder="Descrição da tarefa" required>
    <input type="date" name="vencimento" required>
    <button type="submit">Adicionar</button>
</form>

<div class="separador">Tarefas Pendentes</div>

<table>
    <tr>
        <th>Descrição</th>
        <th>Vencimento</th>
        <th>Ações</th>
    </tr>

    <?php foreach($pendentes as $t): ?>
    <tr>
        <td><?php echo $t['descricao']; ?></td>
        <td><?php echo date("d/m/Y", strtotime($t['vencimento'])); ?></td>
        <td>
            <a class="btn-verde" href="update_tarefa.php?id=<?php echo $t['id']; ?>">Concluir</a>
            <a class="btn-vermelho" href="delete_tarefa.php?id=<?php echo $t['id']; ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="separador">Tarefas Concluídas</div>

<table>
    <tr>
        <th>Tarefa</th>
        <th>Vencimento</th>
        <th>Ações</th>
    </tr>

    <?php foreach($concluidas as $t): ?>
    <tr>
        <td><s><?php echo $t['descricao']; ?></s></td>
        <td><?php echo date("d/m/Y", strtotime($t['vencimento'])); ?></td>
        <td>
            <a class="btn-vermelho" href="delete_tarefa.php?id=<?php echo $t['id']; ?>">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</div>

</body>
</html>
