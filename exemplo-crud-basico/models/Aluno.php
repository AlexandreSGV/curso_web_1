<?php
/**
 * O Model no padrão MVC (Model-View-Controller) é responsável por
 * representar os dados da aplicação e a lógica de negócios associada.
 * Ele interage com o banco de dados para realizar operações como
 * criação, leitura, atualização e exclusão de dados.
 * 
 * No caso da classe Aluno, ela encapsula todos os dados e operações
 * relacionadas aos alunos, fornecendo métodos para manipular os dados
 * no banco de dados e garantir a integridade e consistência dos mesmos.
 */


require_once '../config/database.php'; // Inclui o arquivo de configuração do banco de dados

class Aluno {
    private $conn; // Conexão com o banco de dados
    private $table_name = "alunos"; // Nome da tabela no banco de dados

    // Propriedades do objeto Aluno
    public $id;
    public $nome;
    public $matricula;
    public $cpf;
    public $email;
    public $data_nascimento;
    public $timestamp_criacao;
    public $timestamp_update;

    // Construtor da classe que recebe uma conexão com o banco de dados
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo aluno
    function create() {
        // Query SQL para inserir um novo registro na tabela alunos
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, matricula=:matricula, cpf=:cpf, email=:email, data_nascimento=:data_nascimento";

        // Prepara a query para execução
        // A variável $statement é uma forma mais descritiva e representa a instrução SQL preparada
        $statement = $this->conn->prepare($query);

        // Sanitiza os dados (remove caracteres especiais para evitar SQL injection)
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->matricula = htmlspecialchars(strip_tags($this->matricula));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));

        // Faz o bind dos valores sanitizados aos parâmetros da query
        $statement->bindParam(":nome", $this->nome);
        $statement->bindParam(":matricula", $this->matricula);
        $statement->bindParam(":cpf", $this->cpf);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":data_nascimento", $this->data_nascimento);

        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }

    // Método para obter todos os alunos
    function read() {
        // Query SQL para selecionar todos os registros da tabela alunos
        $query = "SELECT * FROM " . $this->table_name;
        $statement = $this->conn->prepare($query); // Prepara a query para execução
        $statement->execute(); // Executa a query
        return $statement; // Retorna o resultado da query
    }

    // Método para obter um aluno por ID
    function readOne() {
        // Query SQL para selecionar um único registro da tabela alunos pelo ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $statement = $this->conn->prepare($query); // Prepara a query para execução
        $statement->bindParam(1, $this->id); // Faz o bind do ID ao parâmetro da query
        $statement->execute(); // Executa a query

        $row = $statement->fetch(PDO::FETCH_ASSOC); // Obtém o resultado da query

        // Define as propriedades do objeto Aluno com os dados obtidos
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
        // Query SQL para atualizar um registro na tabela alunos
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, matricula = :matricula, cpf = :cpf, email = :email, data_nascimento = :data_nascimento WHERE id = :id";

        // Prepara a query para execução
        $statement = $this->conn->prepare($query);

        // Sanitiza os dados (remove caracteres especiais para evitar SQL injection)
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->matricula = htmlspecialchars(strip_tags($this->matricula));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Faz o bind dos valores sanitizados aos parâmetros da query
        $statement->bindParam(':nome', $this->nome);
        $statement->bindParam(':matricula', $this->matricula);
        $statement->bindParam(':cpf', $this->cpf);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':data_nascimento', $this->data_nascimento);
        $statement->bindParam(':id', $this->id);

        // Executa a query e retorna true se bem-sucedida, false caso contrário
        if($statement->execute()) {
            return true;
        }

        return false;
    }

    // Método para deletar um aluno
    function delete() {
        // Query SQL para deletar um registro na tabela alunos
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
