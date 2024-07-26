<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM alunos");
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Alunos</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-aluno.php">Listar Alunos</a></li>
                <li><a href="create-aluno.php">Adicionar Aluno</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Alunos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Data de Nascimento</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?= $aluno['id'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['matricula'] ?></td>
                        <td><?= $aluno['data_nascimento'] ?></td>
                        <td><?= $aluno['email'] ?></td>
                        <td>
                            <a href="update-aluno.php?id=<?= $aluno['id'] ?>">Editar</a>
                            <a href="delete-aluno.php?id=<?= $aluno['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>
