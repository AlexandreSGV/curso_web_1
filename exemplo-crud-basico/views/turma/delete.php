<!-- views/turma/delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Turma</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Deletar Turma</h1>
    <p>Tem certeza que deseja deletar a turma <?php echo $this->turma->nome; ?>?</p>
    <form action="index.php?action=delete-turma&id=<?php echo $this->turma->id; ?>" method="POST">
        <input type="submit" value="Deletar">
    </form>
    <a href="index.php">Cancelar</a>
</body>
</html>
