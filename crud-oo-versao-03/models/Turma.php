<?php
/**
 * O Model no padrão MVC (Model-View-Controller) é responsável por
 * representar os dados da aplicação e a lógica de negócios associada.
 * Ele interage com o banco de dados para realizar operações como
 * criação, leitura, atualização e exclusão de dados.
 * 
 * No caso da classe Turma, ela encapsula todos os dados e operações
 * relacionadas aos turmas, fornecendo métodos para manipular os dados
 * no banco de dados e garantir a integridade e consistência dos mesmos.
 */


require_once '../config/database.php'; // Inclui o arquivo de configuração do banco de dados

class Turma {
    private $conn; // Conexão com o banco de dados
    private $table_name = "turmas"; // Nome da tabela no banco de dados

    // Propriedades do objeto Turma
    public $id;
    public $nome;
    public $professor;
    public $turno;
    public $timestamp_criacao;
    public $timestamp_update;

    // Construtor da classe que recebe uma conexão com o banco de dados
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo turma
    function create() {
        // Query SQL para inserir um novo registro na tabela turmas
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, professor=:professor, turno=:turno";

        // Prepara a query para execução
        // A variável $statement é uma forma mais descritiva e representa a instrução SQL preparada
        $statement = $this->conn->prepare($query);

        // Sanitiza os dados (remove caracteres especiais para evitar SQL injection)
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->professor = htmlspecialchars(strip_tags($this->professor));
        $this->turno = htmlspecialchars(strip_tags($this->turno));
        
        // Faz o bind dos valores sanitizados aos parâmetros da query
        $statement->bindParam(":nome", $this->nome);
        $statement->bindParam(":professor", $this->professor);
        $statement->bindParam(":turno", $this->turno);
        
        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }

    // Método para obter todos os turmas
    function index() {
        // Query SQL para selecionar todos os registros da tabela turmas
        $query = "SELECT * FROM " . $this->table_name;
        $statement = $this->conn->prepare($query); // Prepara a query para execução
        $statement->execute(); // Executa a query
        return $statement; // Retorna o resultado da query
    }

    // Método para obter um turma por ID
    function read() {
        // Query SQL para selecionar um único registro da tabela turmas pelo ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $statement = $this->conn->prepare($query); // Prepara a query para execução
        $statement->bindParam(1, $this->id); // Faz o bind do ID ao parâmetro da query
        $statement->execute(); // Executa a query

        $row = $statement->fetch(PDO::FETCH_ASSOC); // Obtém o resultado da query

        // Define as propriedades do objeto Turma com os dados obtidos
        $this->nome = $row['nome'];
        $this->professor = $row['professor'];
        $this->turno = $row['turno'];
        $this->timestamp_criacao = $row['timestamp_criacao'];
        $this->timestamp_update = $row['timestamp_update'];
    }

    // Método para atualizar um turma
    function edit() {
        // Query SQL para atualizar um registro na tabela turmas
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, professor = :professor, turno = :turno WHERE id = :id";

        // Prepara a query para execução
        $statement = $this->conn->prepare($query);

        // Sanitiza os dados (remove caracteres especiais para evitar SQL injection)
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->professor = htmlspecialchars(strip_tags($this->professor));
        $this->turno = htmlspecialchars(strip_tags($this->turno));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Faz o bind dos valores sanitizados aos parâmetros da query
        $statement->bindParam(':nome', $this->nome);
        $statement->bindParam(':professor', $this->professor);
        $statement->bindParam(':turno', $this->turno);
        $statement->bindParam(':id', $this->id);

        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }

    // Método para deletar um turma
    function delete() {
        // Query SQL para deletar um registro na tabela turmas
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $statement = $this->conn->prepare($query); // Prepara a query para execução

        // Sanitiza o ID (remove caracteres especiais para evitar SQL injection)
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Faz o bind do ID ao parâmetro da query
        $statement->bindParam(1, $this->id);

        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }
}
?>
