<!-- views/aluno/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Lista de Alunos</h1>
    <nav>
        <a href="index.php">Alunos</a>
        <a href="index.php?action=list-turmas">Turmas</a>
    </nav>
    <a href="index.php?action=create-aluno">Adicionar Aluno</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alunos as $aluno): ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['matricula']; ?></td>
                    <td><?php echo $aluno['cpf']; ?></td>
                    <td><?php echo $aluno['email']; ?></td>
                    <td><?php echo $aluno['data_nascimento']; ?></td>
                    <td>
                        <a href="index.php?action=show-aluno&id=<?php echo $aluno['id']; ?>">Ver</a>
                        <a href="index.php?action=edit-aluno&id=<?php echo $aluno['id']; ?>">Editar</a>
                        <a href="index.php?action=delete-aluno&id=<?php echo $aluno['id']; ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
