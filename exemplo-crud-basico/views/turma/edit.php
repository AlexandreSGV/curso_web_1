<!-- views/turma/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Turma</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Turma</h1>
    <form action="index.php?action=edit-turma&id=<?php echo $this->turma->id; ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $this->turma->nome; ?>" required>
        
        <label for="turno">Turno:</label>
        <input type="text" name="turno" value="<?php echo $this->turma->turno; ?>" required>
        
        <label for="nome_professor">Nome do Professor:</label>
        <input type="text" name="nome_professor" value="<?php echo $this->turma->nome_professor; ?>" required>
        
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
