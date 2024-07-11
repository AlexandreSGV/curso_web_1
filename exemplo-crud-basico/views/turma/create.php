<!-- views/turma/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Turma</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Criar Turma</h1>
    <form action="index.php?action=create-turma" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        
        <label for="turno">Turno:</label>
        <input type="text" name="turno" required>
        
        <label for="nome_professor">Nome do Professor:</label>
        <input type="text" name="nome_professor" required>
        
        <input type="submit" value="Criar">
    </form>
</body>
</html>
