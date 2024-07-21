<?php
/**
 * O Controller no padrão MVC (Model-View-Controller) é responsável por
 * receber as requisições do usuário, processar essas requisições
 * interagindo com o Model (a lógica de negócio e a manipulação de dados),
 * e então selecionar a View apropriada para exibir a resposta.
 * 
 * No caso da classe AlunoController, ela gerencia as operações CRUD
 * (Create, Read, Update, Delete) para os alunos, chamando os métodos
 * apropriados do modelo Aluno e determinando qual view deve ser exibida
 * para o usuário com base na ação solicitada.
 */


require_once '../models/Aluno.php'; // Inclui o arquivo de modelo Aluno
require_once '../config/database.php'; // Inclui o arquivo de configuração do banco de dados

class AlunoController {
    private $db; // Conexão com o banco de dados
    private $aluno; // Instância da classe Aluno

    // Construtor da classe que inicializa a conexão com o banco de dados e cria uma instância da classe Aluno
    public function __construct() {
        $database = new Database(); // Cria uma instância da classe Database
        $this->db = $database->getConnection(); // Obtém a conexão com o banco de dados
        $this->aluno = new Aluno($this->db); // Cria uma instância da classe Aluno passando a conexão do banco de dados
    }

    // Método para exibir todos os alunos
    public function index() {
        $statement = $this->aluno->index(); // Obtém todos os alunos chamando o método index() da classe Aluno
        $alunos = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch os dados e armazena em um array associativo
        return ['view' => '../views/aluno/index.php', 'data' => compact('alunos')]; // Retorna a view e os dados dos alunos
    }

    // Método para exibir o formulário de criação e salvar um novo aluno
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o método de requisição é POST
            // Define as propriedades do aluno com os dados do formulário
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->matricula = $_POST['matricula'];
            $this->aluno->cpf = $_POST['cpf'];
            $this->aluno->email = $_POST['email'];
            $this->aluno->data_nascimento = $_POST['data_nascimento'];

            // Chama o método create() da classe Aluno para salvar o aluno no banco de dados
            if ($this->aluno->create()) {
                header("Location: index.php?action=list-alunos"); // Redireciona para a lista de alunos se o aluno for criado com sucesso
            }
        }
        return ['view' => '../views/aluno/create.php', 'data' => []]; // Retorna a view do formulário de criação
    }

    // Método para exibir os detalhes de um aluno
    public function read($id) {
        $this->aluno->id = $id; // Define o ID do aluno
        $this->aluno->read(); // Obtém os detalhes do aluno chamando o método read() da classe Aluno
        return ['view' => '../views/aluno/read.php', 'data' => ['aluno' => $this->aluno]]; // Retorna a view e os dados do aluno
    }

    // Método para exibir o formulário de edição e atualizar um aluno
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o método de requisição é POST
            // Define as propriedades do aluno com os dados do formulário
            $this->aluno->id = $id;
            $this->aluno->nome = $_POST['nome'];
            $this->aluno->matricula = $_POST['matricula'];
            $this->aluno->cpf = $_POST['cpf'];
            $this->aluno->email = $_POST['email'];
            $this->aluno->data_nascimento = $_POST['data_nascimento'];

            // Chama o método update() da classe Aluno para atualizar o aluno no banco de dados
            if ($this->aluno->update()) {
                header("Location: index.php?action=list-alunos"); // Redireciona para a lista de alunos se o aluno for atualizado com sucesso
            }
        } else {
            $this->aluno->id = $id; // Define o ID do aluno
            $this->aluno->read(); // Obtém os detalhes do aluno chamando o método read() da classe Aluno
        }
        return ['view' => '../views/aluno/edit.php', 'data' => ['aluno' => $this->aluno]]; // Retorna a view do formulário de edição e os dados do aluno
    }

    // Método para deletar um aluno
    public function delete($id) {
        $this->aluno->id = $id; // Define o ID do aluno
        // Chama o método delete() da classe Aluno para deletar o aluno no banco de dados
        if ($this->aluno->delete()) {
            header("Location: index.php?action=list-alunos"); // Redireciona para a lista de alunos se o aluno for deletado com sucesso
            exit;
        }
    }
}
?>
