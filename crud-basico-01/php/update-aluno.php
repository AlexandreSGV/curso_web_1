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

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    
    // Prepara a instrução SQL para atualizar os dados do aluno
    $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, matricula = ?, data_nascimento = ?, email = ? WHERE id = ?");
    
    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$nome, $matricula, $dataNascimento, $email, $id]);
    
    // Redireciona para a página de listagem de alunos após a atualização
    header('Location: index-aluno.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
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
        <h2>Editar Aluno</h2>
        <!-- Formulário para editar os dados do aluno -->
        <form method="POST">
            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do aluno -->
            <input type="text" id="nome" name="nome" value="<?= $aluno['nome'] ?>" required>
            
            <label for="matricula">Matrícula:</label>
            <!-- Campo para inserir a matrícula do aluno -->
            <input type="text" id="matricula" name="matricula" value="<?= $aluno['matricula'] ?>" required>
            
            <label for="dataNascimento">Data de Nascimento:</label>
            <!-- Campo para inserir a data de nascimento do aluno -->
            <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $aluno['data_nascimento'] ?>" required>
            
            <label for="email">E-mail:</label>
            <!-- Campo para inserir o e-mail do aluno -->
            <input type="email" id="email" name="email" value="<?= $aluno['email'] ?>" required>
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>
