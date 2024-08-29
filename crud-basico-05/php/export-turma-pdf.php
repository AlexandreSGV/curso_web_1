<?php
require_once 'db.php';
require '../vendor/autoload.php'; // Inclui o autoload do Composer

use Dompdf\Dompdf;

// Obter o ID da turma da URL
$id = $_GET['id'];

// Seleciona a turma específica pelo ID
$stmt = $pdo->prepare("SELECT turmas.*, professores.nome AS professor_nome FROM turmas LEFT JOIN professores ON turmas.professor_id = professores.id WHERE turmas.id = ?");
$stmt->execute([$id]);
$turma = $stmt->fetch(PDO::FETCH_ASSOC);

// Seleciona os alunos matriculados na turma
$stmt = $pdo->prepare("SELECT alunos.* FROM alunos INNER JOIN matriculas ON alunos.id = matriculas.aluno_id WHERE matriculas.turma_id = ?");
$stmt->execute([$id]);
$alunosMatriculados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inicializa o domPDF
$dompdf = new Dompdf();

// Cria o conteúdo HTML do PDF
$html = '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Turma</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Detalhes da Turma</h1>
    <p><strong>ID:</strong> ' . $turma['id'] . '</p>
    <p><strong>Disciplina:</strong> ' . $turma['disciplina'] . '</p>
    <p><strong>Turno:</strong> ' . $turma['turno'] . '</p>
    <p><strong>Professor:</strong> ' . $turma['professor_nome'] . '</p>
    
    <h2>Alunos Matriculados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>';
            foreach ($alunosMatriculados as $aluno) {
                $html .= '<tr><td>' . $aluno['id'] . '</td><td>' . $aluno['nome'] . '</td></tr>';
            }
$html .= '
        </tbody>
    </table>
</body>
</html>';

// Carrega o HTML no domPDF
$dompdf->loadHtml($html);

// Define o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Envia o PDF gerado para o navegador
$dompdf->stream('turma_' . $turma['disciplina'] . '.pdf', array("Attachment" => false));
?>
