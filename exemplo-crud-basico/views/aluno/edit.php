<!-- views/aluno/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Editar Aluno</h1>
    <form action="index.php?action=edit-aluno&id=<?php echo $this->aluno->id; ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $this->aluno->nome; ?>" required>
        
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" value="<?php echo $this->aluno->matricula; ?>" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo $this->aluno->cpf; ?>" required>
        
        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $this->aluno->email; ?>" required>
        
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="<?php echo $this->aluno->data_nascimento; ?>" required>
        
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
