<!-- views/aluno/delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Aluno</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Deletar Aluno</h1>
    <p>Tem certeza que deseja deletar o aluno <?php echo $this->aluno->nome; ?>?</p>
    <form action="index.php?action=delete-aluno&id=<?php echo $this->aluno->id; ?>" method="POST">
        <input type="submit" value="Deletar">
    </form>
    <a href="index.php">Cancelar</a>
</body>
</html>
