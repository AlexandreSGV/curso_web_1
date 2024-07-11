<!-- views/turma/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Lista de Turmas</h1>
    <nav>
        <a href="index.php">Alunos</a>
        <a href="index.php?action=list-turmas">Turmas</a>
    </nav>
    <a href="index.php?action=create-turma">Adicionar Turma</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Turno</th>
                <th>Nome do Professor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($turmas as $turma): ?>
                <tr>
                    <td><?php echo $turma['id']; ?></td>
                    <td><?php echo $turma['nome']; ?></td>
                    <td><?php echo $turma['turno']; ?></td>
                    <td><?php echo $turma['nome_professor']; ?></td>
                    <td>
                        <a href="index.php?action=show-turma&id=<?php echo $turma['id']; ?>">Ver</a>
                        <a href="index.php?action=edit-turma&id=<?php echo $turma['id']; ?>">Editar</a>
                        <a href="index.php?action=delete-turma&id=<?php echo $turma['id']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
