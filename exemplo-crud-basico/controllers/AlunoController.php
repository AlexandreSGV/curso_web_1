<!-- controllers/AlunoController.php -->
<?php
require_once '../models/Aluno.php';
require_once '../config/database.php';

class AlunoController {
    private $db;
    private $aluno;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->aluno = new Aluno($this->db);
    }

    // Método para exibir todos os alunos
    public function index() {
        $stmt = $this->aluno->read();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/aluno/index.php';
    }

    // Método para exibir o formulário de criação
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->matricula = $_POST['matricula'];
            $this->aluno->cpf = $_POST['cpf'];
            $this->aluno->email = $_POST['email'];
            $this->aluno->data_nascimento = $_POST['data_nascimento'];

            if ($this->aluno->create()) {
                header("Location: index.php");
            }
        }
        include '../views/aluno/create.php';
    }

    // Método para exibir os detalhes de um aluno
    public function show($id) {
        $this->aluno->id = $id;
        $this->aluno->readOne();
        include '../views/aluno/show.php';
    }

    // Método para exibir o formulário de edição
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->aluno->id = $id;
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->matricula = $_POST['matricula'];
            $this->aluno->cpf = $_POST['cpf'];
            $this->aluno->email = $_POST['email'];
            $this->aluno->data_nascimento = $_POST['data_nascimento'];

            if ($this->aluno->update()) {
                header("Location: index.php");
            }
        } else {
            $this->aluno->id = $id;
            $this->aluno->readOne();
            include '../views/aluno/edit.php';
        }
    }

    // Método para deletar um aluno
    public function delete($id) {
        $this->aluno->id = $id;
        if ($this->aluno->delete()) {
            header("Location: index.php");
        }
    }
}
?>
