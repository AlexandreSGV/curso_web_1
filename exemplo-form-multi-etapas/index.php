<?php
require_once 'db.php';

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $empresa = $_POST['empresa'];
    $cargo = $_POST['cargo'];
    $experiencia = $_POST['experiencia'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Prepara o comando SQL para inserção dos dados
    $sql = "INSERT INTO usuarios (nome, email, nascimento, empresa, cargo, experiencia, endereco, cidade, estado) 
            VALUES (:nome, :email, :nascimento, :empresa, :cargo, :experiencia, :endereco, :cidade, :estado)";
    
    // Prepara a execução da instrução SQL
    $stmt = $pdo->prepare($sql);

    // Executa a instrução SQL com os dados capturados do formulário
    try {
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':nascimento' => $nascimento,
            ':empresa' => $empresa,
            ':cargo' => $cargo,
            ':experiencia' => $experiencia,
            ':endereco' => $endereco,
            ':cidade' => $cidade,
            ':estado' => $estado
        ]);
        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao realizar o cadastro: " . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Multi-step Form</title>
    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .error {
            border-color: red;
        }

        .navigation {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form id="multiStepForm">
        <!-- Etapa 1: Dados Pessoais -->
        <div class="step active" id="step1">
            <h2>Dados Pessoais</h2>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" required><br><br>
        </div>

        <!-- Etapa 2: Dados Profissionais -->
        <div class="step" id="step2">
            <h2>Dados Profissionais</h2>
            <label for="empresa">Empresa:</label>
            <input type="text" id="empresa" name="empresa" required><br><br>

            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required><br><br>

            <label for="experiencia">Anos de Experiência:</label>
            <input type="number" id="experiencia" name="experiencia" required><br><br>
        </div>

        <!-- Etapa 3: Endereço -->
        <div class="step" id="step3">
            <h2>Endereço</h2>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required><br><br>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required><br><br>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required><br><br>
        </div>

        <!-- Navegação -->
        <div class="navigation">
            <button type="button" onclick="previousStep()">Anterior</button>
            <button type="button" onclick="nextStep()">Próximo</button>
            <button type="submit" id="submitBtn" style="display:none;">Enviar</button>
        </div>
    </form>

    <script>
        let currentStep = 1;

        function showStep(step) {
            // Esconde todas as etapas
            document.querySelectorAll('.step').forEach((element) => {
                element.classList.remove('active');
            });

            // Mostra a etapa atual
            document.getElementById('step' + step).classList.add('active');

            // Controle dos botões de navegação
            document.querySelector('[onclick="previousStep()"]').style.display = step === 1 ? 'none' : 'inline';
            document.querySelector('[onclick="nextStep()"]').style.display = step === 3 ? 'none' : 'inline';
            document.getElementById('submitBtn').style.display = step === 3 ? 'inline' : 'none';
        }

        function validateStep(step) {
            let valid = true;
            const inputs = document.querySelectorAll(`#step${step} input`);
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    valid = false;
                    input.classList.add('error'); // Adiciona uma classe para indicar erro
                } else {
                    input.classList.remove('error');
                }
            });
            return valid;
        }

        function nextStep() {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function previousStep() {
            currentStep--;
            showStep(currentStep);
        }

        // Inicializa o formulário mostrando a primeira etapa
        showStep(currentStep);
    </script>
</body>
</html>
