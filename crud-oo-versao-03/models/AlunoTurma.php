<?php
require_once '../config/database.php';

class AlunoTurma {
    private $conn; // Conexão com o banco de dados
    private $table_name = "aluno_turma"; // Nome da tabela no banco de dados

    // Propriedades do objeto AlunoTurma
    public $aluno_id;
    public $turma_id;

    // Construtor da classe que recebe uma conexão com o banco de dados
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para matricular um aluno em uma turma
    function matricular() {
        // Query SQL para inserir um novo registro na tabela aluno_turma
        $query = "INSERT INTO " . $this->table_name . " SET aluno_id=:aluno_id, turma_id=:turma_id";

        // Prepara a query para execução
        $statement = $this->conn->prepare($query);

        // Faz o bind dos valores aos parâmetros da query
        $statement->bindParam(":aluno_id", $this->aluno_id);
        $statement->bindParam(":turma_id", $this->turma_id);

        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }

    // Método para desmatricular um aluno de uma turma
    function desmatricular() {
        // Query SQL para deletar um registro na tabela aluno_turma
        $query = "DELETE FROM " . $this->table_name . " WHERE aluno_id = :aluno_id AND turma_id = :turma_id";

        // Prepara a query para execução
        $statement = $this->conn->prepare($query);

        // Faz o bind dos valores aos parâmetros da query
        $statement->bindParam(":aluno_id", $this->aluno_id);
        $statement->bindParam(":turma_id", $this->turma_id);

        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }

    // Método para listar todas as turmas de um aluno
    function listarTurmasDoAluno() {
        // Query SQL para selecionar todas as turmas de um aluno
        $query = "SELECT t.* FROM turmas t INNER JOIN " . $this->table_name . " at ON t.id = at.turma_id WHERE at.aluno_id = :aluno_id";

        // Prepara a query para execução
        $statement = $this->conn->prepare($query);

        // Faz o bind do valor ao parâmetro da query
        $statement->bindParam(":aluno_id", $this->aluno_id);

        // Executa a query
        $statement->execute();

        return $statement;
    }

    // Método para listar todos os alunos de uma turma
    function listarAlunosDaTurma() {
        // Query SQL para selecionar todos os alunos de uma turma
        $query = "SELECT a.* FROM alunos a INNER JOIN " . $this->table_name . " at ON a.id = at.aluno_id WHERE at.turma_id = :turma_id";

        // Prepara a query para execução
        $statement = $this->conn->prepare($query);

        // Faz o bind do valor ao parâmetro da query
        $statement->bindParam(":turma_id", $this->turma_id);

        // Executa a query
        $statement->execute();

        return $statement;
    }
}
?>
