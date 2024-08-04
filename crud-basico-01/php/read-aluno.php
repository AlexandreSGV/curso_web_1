<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Obtém o ID do aluno a partir da URL usando o método GET
    $id = $_GET['id'];

    // Prepara a instrução SQL para selecionar o aluno pelo ID
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
    // Executa a instrução SQL, passando o ID do aluno como parâmetro
    $stmt->execute([$id]);

    // Recupera os dados do aluno como um array associativo
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
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
        <h2>Detalhes do Aluno</h2>
        <?php if ($aluno): ?>
            <!-- Exibe os detalhes do aluno -->
            <p><strong>ID:</strong> <?= $aluno['id'] ?></p>
            <p><strong>Nome:</strong> <?= $aluno['nome'] ?></p>
            <p><strong>Matrícula:</strong> <?= $aluno['matricula'] ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $aluno['data_nascimento'] ?></p>
            <p><strong>E-mail:</strong> <?= $aluno['email'] ?></p>
            <p>
                <!-- Links para editar e excluir o aluno -->
                <a href="update-aluno.php?id=<?= $aluno['id'] ?>">Editar</a>
                <a href="delete-aluno.php?id=<?= $aluno['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <!-- Exibe uma mensagem caso o aluno não seja encontrado -->
            <p>Aluno não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>
