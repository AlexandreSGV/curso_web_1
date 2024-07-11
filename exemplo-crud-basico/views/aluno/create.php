<!-- views/aluno/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Aluno</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Criar Aluno</h1>
    <form action="index.php?action=create-aluno" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required>
        
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>
        
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required>
        
        <input type="submit" value="Criar">
    </form>
</body>
</html>
