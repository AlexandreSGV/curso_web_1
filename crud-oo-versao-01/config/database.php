<?php
/**
 * A classe Database é criada para centralizar e gerenciar a conexão com o banco de dados.
 * 
 * Vantagens de criar uma classe Database:
 * 1. Centralização da Conexão: Facilita a manutenção e atualização das configurações de conexão em um único lugar.
 * 2. Reuso: Permite reutilizar a mesma lógica de conexão em diferentes partes da aplicação, evitando duplicação de código.
 * 3. Facilidade de Testes: Facilita a criação de testes unitários e de integração, permitindo a simulação e a substituição de conexões com o banco de dados.
 * 4. Encapsulamento: Oculta os detalhes da implementação da conexão, expondo apenas os métodos necessários para obter a conexão.
 * 
 * Escolha do PDO (PHP Data Objects):
 * 1. Suporte a Vários Bancos de Dados: PDO suporta diversos sistemas de gerenciamento de banco de dados (MySQL, PostgreSQL, SQLite, etc.), facilitando a portabilidade.
 * 2. Prevenção de SQL Injection: PDO utiliza prepared statements, que ajudam a prevenir ataques de SQL injection.
 * 3. Manipulação de Erros: PDO fornece uma interface consistente para manipulação de erros e exceções.
 * 4. Flexibilidade: PDO oferece métodos avançados para manipulação de resultados e configurações de conexão.
 */

class Database {
    // Propriedades para armazenar os detalhes da conexão com o banco de dados
    private $host = "localhost"; // Host do banco de dados, geralmente é "localhost"
    private $db_name = "sistema_academico"; // Nome do banco de dados
    private $username = "root"; // Nome de usuário do banco de dados
    private $password = "1234"; // Senha do banco de dados
    public $conn; // Propriedade que armazenará a conexão com o banco de dados

    // Método para obter a conexão com o banco de dados
    public function getConnection() {
        // Inicializa a conexão como nula
        $this->conn = null;
        try {
            // Tenta criar uma nova conexão PDO com o banco de dados usando os detalhes fornecidos
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Define o conjunto de caracteres para utf8
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            // Em caso de erro, captura a exceção e exibe uma mensagem de erro
            echo "Connection error: " . $exception->getMessage();
        }
        // Retorna a conexão com o banco de dados
        return $this->conn;
    }
}
?>
