<!--  models/Turma.php -->
<?php
require_once '../config/database.php';

class Turma {
    private $conn;
    private $table_name = "turmas";

    public $id;
    public $nome;
    public $turno;
    public $nome_professor;
    public $timestamp_criacao;
    public $timestamp_update;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar uma nova turma
    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, turno=:turno, nome_professor=:nome_professor";

        $stmt = $this->conn->prepare($query);

        // sanitizar
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->turno = htmlspecialchars(strip_tags($this->turno));
        $this->nome_professor = htmlspecialchars(strip_tags($this->nome_professor));

        // bind dos valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":turno", $this->turno);
        $stmt->bindParam(":nome_professor", $this->nome_professor);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para obter todas as turmas
    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obter uma turma por ID
    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->turno = $row['turno'];
        $this->nome_professor = $row['nome_professor'];
        $this->timestamp_criacao = $row['timestamp_criacao'];
        $this->timestamp_update = $row['timestamp_update'];
    }

    // Método para atualizar uma turma
    function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, turno = :turno, nome_professor = :nome_professor WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // sanitizar
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->turno = htmlspecialchars(strip_tags($this->turno));
        $this->nome_professor = htmlspecialchars(strip_tags($this->nome_professor));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind dos valores
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':turno', $this->turno);
        $stmt->bindParam(':nome_professor', $this->nome_professor);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para deletar uma turma
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        // sanitizar
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind dos valores
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
