<?php
try {
    $db = new PDO('sqlite:tarefas.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $db->exec("CREATE TABLE IF NOT EXISTS tarefas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        descricao TEXT,
        vencimento TEXT,
        concluida INTEGER DEFAULT 0
    )");

} catch (Exception $e) {
    echo "Erro no banco: " . $e->getMessage();
}
?>