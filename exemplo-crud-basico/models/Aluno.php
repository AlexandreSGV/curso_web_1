 <!-- models/Aluno.php -->
<?php
require_once '../config/database.php';

class Aluno {
    private $conn;
    private $table_name = "alunos";

    public $id;
    public $nome;
    public $matricula;
    public $cpf;
    public $email;
    public $data_nascimento;
    public $timestamp_criacao;
    public $timestamp_update;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo aluno
    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, matricula=:matricula, cpf=:cpf, email=:email, data_nascimento=:data_nascimento";

        $stmt = $this->conn->prepare($query);

        // sanitizar
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->matricula = htmlspecialchars(strip_tags($this->matricula));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));

        // bind dos valores
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":matricula", $this->matricula);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para obter todos os alunos
    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obter um aluno por ID
    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->matricula = $row['matricula'];
        $this->cpf = $row['cpf'];
        $this->email = $row['email'];
        $this->data_nascimento = $row['data_nascimento'];
        $this->timestamp_criacao = $row['timestamp_criacao'];
        $this->timestamp_update = $row['timestamp_update'];
    }

    // Método para atualizar um aluno
    function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, matricula = :matricula, cpf = :cpf, email = :email, data_nascimento = :data_nascimento WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // sanitizar
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->matricula = htmlspecialchars(strip_tags($this->matricula));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind dos valores
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para deletar um aluno
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
