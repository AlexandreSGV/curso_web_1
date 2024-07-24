<?php
// Inclui o controlador de Aluno
require_once '../controllers/AlunoController.php';
require_once '../controllers/TurmaController.php';

// Cria uma instância do controlador de Aluno
$alunoController = new AlunoController();
// Cria uma instância do controlador de Turma
$turmaController = new TurmaController();

// Obtém a ação a ser executada a partir dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : ''; // Ação, se definida, caso contrário uma string vazia
$id = isset($_GET['id']) ? $_GET['id'] : 0; // ID, se definido, caso contrário 0

// Inicializa a variável de resultado com a view e os dados vazios
$result = ['view' => '', 'data' => []];

// Verifica a ação e chama o método correspondente no controlador de Aluno
switch ($action) {
    case 'create-aluno':
        // Chama o método create() do controlador de Aluno para criar um novo aluno
        $result = $alunoController->create();
        break;
    case 'read-aluno':
        // Chama o método read() do controlador de Aluno para exibir os detalhes de um aluno
        $result = $alunoController->read($id);
        break;
    case 'edit-aluno':
        // Chama o método edit() do controlador de Aluno para editar um aluno
        $result = $alunoController->edit($id);
        break;
    case 'delete-aluno':
        // Chama o método delete() do controlador de Aluno para deletar um aluno
        $alunoController->delete($id);
        break;
    case 'list-alunos':
        // Chama o método index() do controlador de Aluno para listar todos os alunos
        $result = $alunoController->index();
        break;

// Actions de turma

    case 'create-turma':
        // Chama o método create() do controlador de Aluno para criar um novo turma
        $result = $turmaController->create();
        break;
    case 'read-turma':
        // Chama o método read() do controlador de Aluno para exibir os detalhes de um turma
        $result = $turmaController->read($id);
        break;
    case 'edit-turma':
        // Chama o método edit() do controlador de Aluno para editar um turma
        $result = $turmaController->edit($id);
        break;
    case 'delete-turma':
        // Chama o método delete() do controlador de Aluno para deletar um turma
        $turmaController->delete($id);
        break;
    case 'list-turmas':
        // Chama o método index() do controlador de Aluno para listar todos os turmas
        $result = $turmaController->index();
        break;
    


    default:
        // Define a view padrão como home.php
        $result['view'] = '../views/home.php';
        break;
}

// Define a view e os dados a serem passados para o layout
$view = $result['view'];
$data = $result['data'];

// Inclui o layout principal e passa a view e os dados
include('../views/layout.php');

