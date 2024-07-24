<?php
/**
 * O Controller no padrão MVC (Model-View-Controller) é responsável por
 * receber as requisições do usuário, processar essas requisições
 * interagindo com o Model (a lógica de negócio e a manipulação de dados),
 * e então selecionar a View apropriada para exibir a resposta.
 * 
 * No caso da classe TurmaController, ela gerencia as operações CRUD
 * (Create, Read, Update, Delete) para os turmas, chamando os métodos
 * apropriados do modelo Turma e determinando qual view deve ser exibida
 * para o usuário com base na ação solicitada.
 */


require_once '../models/Turma.php'; // Inclui o arquivo de modelo Turma
require_once '../models/AlunoTurma.php';
require_once '../config/database.php'; // Inclui o arquivo de configuração do banco de dados

class TurmaController {
    private $db; // Conexão com o banco de dados
    private $turma; // Instância da classe Turma
    private $alunoTurma;


    // Construtor da classe que inicializa a conexão com o banco de dados e cria uma instância da classe Turma
    public function __construct() {
        $database = new Database(); // Cria uma instância da classe Database
        $this->db = $database->getConnection(); // Obtém a conexão com o banco de dados
        $this->turma = new Turma($this->db); // Cria uma instância da classe Turma passando a conexão do banco de dados
        $this->alunoTurma = new AlunoTurma($this->db);

    }

    // Método para exibir todos os turmas
    public function index() {
        $statement = $this->turma->index(); // Obtém todos os turmas chamando o método index() da classe Turma
        $turmas = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch os dados e armazena em um array associativo
        return ['view' => '../views/turma/index.php', 'data' => compact('turmas')]; // Retorna a view e os dados dos turmas
    }

    // Método para exibir o formulário de criação e salvar um novo turma
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o método de requisição é POST
            // Define as propriedades do turma com os dados do formulário
            $this->turma->nome = $_POST['nome'];
            $this->turma->professor = $_POST['professor'];
            $this->turma->turno = $_POST['turno'];
            
            // Chama o método create() da classe Turma para salvar o turma no banco de dados
            if ($this->turma->create()) {
                header("Location: index.php?action=list-turmas"); // Redireciona para a lista de turmas se o turma for criado com sucesso
            }
        }
        return ['view' => '../views/turma/create.php', 'data' => []]; // Retorna a view do formulário de criação
    }

    // Método para exibir os detalhes de um turma
    public function read($id) {
        $this->turma->id = $id;
        $this->turma->read();
        $this->alunoTurma->turma_id = $id;
        $statement = $this->alunoTurma->listarAlunosDaTurma();
        $alunos_matriculados = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Carrega todos os alunos que não estão matriculados na turma para o select de matrícula
        $alunoModel = new Aluno($this->db);
        $alunos_disponiveis = $alunoModel->alunosNaoMatriculados($id)->fetchAll(PDO::FETCH_ASSOC);

        return ['view' => '../views/turma/read.php', 'data' => [
            'turma' => $this->turma,
            'alunos_matriculados' => $alunos_matriculados,
            'alunos_disponiveis' => $alunos_disponiveis
        ]];
    }




    // Método para exibir o formulário de edição e atualizar um turma
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o método de requisição é POST
            // Define as propriedades do turma com os dados do formulário
            $this->turma->id = $id;
            $this->turma->nome = $_POST['nome'];
            $this->turma->professor = $_POST['professor'];
            $this->turma->turno = $_POST['turno'];
            
            // Chama o método edit() da classe Turma para atualizar o turma no banco de dados
            if ($this->turma->edit()) {
                header("Location: index.php?action=list-turmas"); // Redireciona para a lista de turmas se o turma for atualizado com sucesso
            }
        } else {
            $this->turma->id = $id; // Define o ID do turma
            $this->turma->read(); // Obtém os detalhes do turma chamando o método read() da classe Turma
        }
        return ['view' => '../views/turma/edit.php', 'data' => ['turma' => $this->turma]]; // Retorna a view do formulário de edição e os dados do turma
    }

    // Método para deletar um turma
    public function delete($id) {
        $this->turma->id = $id; // Define o ID do turma
        // Chama o método delete() da classe Turma para deletar o turma no banco de dados
        if ($this->turma->delete()) {
            header("Location: index.php?action=list-turmas"); // Redireciona para a lista de turmas se o turma for deletado com sucesso
            exit;
        }
    }


    // Método para desmatricular um aluno de uma turma
    public function desmatricular($aluno_id, $turma_id) {
        $this->alunoTurma->aluno_id = $aluno_id;
        $this->alunoTurma->turma_id = $turma_id;
        if ($this->alunoTurma->desmatricular()) {
            header("Location: index.php?action=read-turma&id=" . $turma_id);
            exit;
        }
    }

    public function matricular_v1() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valida o ID da turma
            $this->alunoTurma->turma_id = $_POST['turma_id'];
            $this->alunoTurma->aluno_id = $_POST['aluno_id'];

            $turmaModel = new Turma($this->db);
            $alunoModel = new Aluno($this->db);

            $turmaModel->id = $this->alunoTurma->turma_id;
            $alunoModel->id = $this->alunoTurma->aluno_id;

            if (!$turmaModel->read()) {
                $errors[] = "ID da turma inválido.";
            }

            if (!$alunoModel->read()) {
                $errors[] = "ID do aluno inválido.";
            }

            // Se não houver erros, tenta matricular o aluno
            if (empty($errors)) {
                if ($this->alunoTurma->matricular()) {
                    header("Location: index.php?action=read-turma&id=" . $_POST['turma_id']);
                    exit;
                } else {
                    $errors[] = "Falha ao matricular o aluno.";
                }
            }
        }

        // Retorna a view com os erros
        return ['view' => '../views/turma/matricular_v1.php', 'data' => ['errors' => $errors]];
    }





    public function matricular_v2() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->alunoTurma->turma_id = $_POST['turma_id'];
            $this->alunoTurma->aluno_id = $_POST['aluno_id'];
            if ($this->alunoTurma->matricular()) {
                header("Location: index.php?action=read-turma&id=" . $_POST['turma_id']);
                exit;
            }
        } else {
            // Carrega as turmas e alunos para preencher os selects
            $turmas = $this->turma->index()->fetchAll(PDO::FETCH_ASSOC);
            $alunos = (new Aluno($this->db))->index()->fetchAll(PDO::FETCH_ASSOC);
            return ['view' => '../views/turma/matricular_v2.php', 'data' => ['turmas' => $turmas, 'alunos' => $alunos]];
        }
    }

}
?>
