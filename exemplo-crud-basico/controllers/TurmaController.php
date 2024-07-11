<!-- controllers/TurmaController.php -->
<?php
require_once '../models/Turma.php';
require_once '../config/database.php';

class TurmaController {
    private $db;
    private $turma;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->turma = new Turma($this->db);
    }

    // Método para exibir todas as turmas
    public function index() {
        $stmt = $this->turma->read();
        $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/turma/index.php';
    }

    // Método para exibir o formulário de criação
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->turma->nome = $_POST['nome'];
            $this->turma->turno = $_POST['turno'];
            $this->turma->nome_professor = $_POST['nome_professor'];

            if ($this->turma->create()) {
                header("Location: index.php");
            }
        }
        include '../views/turma/create.php';
    }

    // Método para exibir os detalhes de uma turma
    public function show($id) {
        $this->turma->id = $id;
        $this->turma->readOne();
        include '../views/turma/show.php';
    }

    // Método para exibir o formulário de edição
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->turma->id = $id;
            $this->turma->nome = $_POST['nome'];
            $this->turma->turno = $_POST['turno'];
            $this->turma->nome_professor = $_POST['nome_professor'];

            if ($this->turma->update()) {
                header("Location: index.php");
            }
        } else {
            $this->turma->id = $id;
            $this->turma->readOne();
            include '../views/turma/edit.php';
        }
    }

    // Método para deletar uma turma
    public function delete($id) {
        $this->turma->id = $id;
        if ($this->turma->delete()) {
            header("Location: index.php");
        }
    }
}
?>
