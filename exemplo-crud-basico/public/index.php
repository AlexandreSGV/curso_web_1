<!-- public/index.php -->
<?php
require_once '../controllers/AlunoController.php';
require_once '../controllers/TurmaController.php';

$alunoController = new AlunoController();
$turmaController = new TurmaController();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

switch ($action) {
    case 'create-aluno':
        $alunoController->create();
        break;
    case 'show-aluno':
        $alunoController->show($id);
        break;
    case 'edit-aluno':
        $alunoController->edit($id);
        break;
    case 'delete-aluno':
        $alunoController->delete($id);
        break;
    case 'list-turmas':
        $turmaController->index();
        break;
    case 'create-turma':
        $turmaController->create();
        break;
    case 'show-turma':
        $turmaController->show($id);
        break;
    case 'edit-turma':
        $turmaController->edit($id);
        break;
    case 'delete-turma':
        $turmaController->delete($id);
        break;
    default:
        $alunoController->index();
        break;
}
?>
