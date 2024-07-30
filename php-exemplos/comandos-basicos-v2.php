<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exemplos de Comandos PHP</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Exemplos de Comandos PHP versão 2 (uso de tags de abertura e fechamento.)</h1>

    <?php
    // Incluindo o arquivo de funções
    require 'funcoes.php';

    // Declaração de variáveis
    $nome = "Maria";
    $idade = 28;
    $cidade = "São Paulo";
    ?>

    <p>Olá, meu nome é <?php echo $nome; ?>. Eu tenho <?php echo $idade; ?> anos e moro em <?php echo $cidade; ?>.</p>

    <?php
    // Array associativo
    $alunos = [
        "1001" => ["nome" => "João", "nota" => 8.5],
        "1002" => ["nome" => "Ana", "nota" => 9.0],
        "1003" => ["nome" => "Carlos", "nota" => 7.8],
        "1004" => ["nome" => "Beatriz", "nota" => 8.2]
    ];
    ?>

    <h2>Lista de Alunos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nota</th>
        </tr>
        <?php foreach ($alunos as $id => $aluno): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $aluno['nome']; ?></td>
                <td><?php echo $aluno['nota']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Chamada de Função Definida no Mesmo Arquivo</h2>
    <p><?php echo saudacao($nome); ?></p>

    <h2>Chamada de Função Definida em Outro Arquivo</h2>
    <p><?php echo soma(10, 20); ?></p>

    <?php
    // Consulta a uma API (exemplo usando a API JSONPlaceholder)
    $url = 'https://jsonplaceholder.typicode.com/todos/1';
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    ?>

    <h2>Consulta a uma API</h2>
    <p>ID: <?php echo $data['id']; ?></p>
    <p>Título: <?php echo $data['title']; ?></p>

    <h2>Redirecionamento</h2>
    <a href="?action=redirect">Clique aqui para ser redirecionado para o Google</a>

    <?php
    // Função de redirecionamento
    if (isset($_GET['action']) && $_GET['action'] === 'redirect') {
        redirecionar('https://www.google.com');
    }

    // Funções definidas no mesmo arquivo
    function saudacao($nome) {
        return "Olá, $nome! Bem-vindo(a)!";
    }

    function redirecionar($url) {
        header("Location: $url");
        exit;
    }
    ?>
</body>
</html>
