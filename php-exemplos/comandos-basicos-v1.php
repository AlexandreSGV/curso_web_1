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
    <h1>Exemplos de Comandos PHP Versão 1 (uso do echo)</h1>

    <?php
    // Incluindo o arquivo de funções
    require 'funcoes.php';

    // Declaração de variáveis
    $nome = "Maria";
    $idade = 28;
    $cidade = "São Paulo";

    // Concatenação de texto com valor de variáveis
    echo "<p>Olá, meu nome é $nome. Eu tenho $idade anos e moro em $cidade.</p>";

    // Array associativo
    $alunos = [
        "1001" => ["nome" => "João", "nota" => 8.5],
        "1002" => ["nome" => "Ana", "nota" => 9.0],
        "1003" => ["nome" => "Carlos", "nota" => 7.8],
        "1004" => ["nome" => "Beatriz", "nota" => 8.2]
    ];

    // Exibição do array associativo em uma tabela
    echo "<h2>Lista de Alunos</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Nota</th></tr>";

    foreach ($alunos as $id => $aluno) {
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>{$aluno['nome']}</td>";
        echo "<td>{$aluno['nota']}</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Chamando uma função definida no mesmo arquivo
    echo "<h2>Chamada de Função Definida no Mesmo Arquivo</h2>";
    echo "<p>" . saudacao($nome) . "</p>";

    // Chamando uma função definida em outro arquivo
    echo "<h2>Chamada de Função Definida em Outro Arquivo</h2>";
    echo "<p>" . soma(10, 20) . "</p>";

    // Consulta a uma API (exemplo usando a API JSONPlaceholder)
    $url = 'https://jsonplaceholder.typicode.com/todos/1';
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    echo "<h2>Consulta a uma API</h2>";
    echo "<p>ID: " . $data['id'] . "</p>";
    echo "<p>Título: " . $data['title'] . "</p>";

    // Link que chama uma função PHP para redirecionar
    echo "<h2>Redirecionamento</h2>";
    echo "<a href='?action=redirect'>Clique aqui para ser redirecionado para o Google</a>";

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
