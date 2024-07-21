<h1 class="my-4">Detalhes do Aluno</h1>
<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> <?php echo $aluno->id; ?></p>
        <p><strong>Nome:</strong> <?php echo $aluno->nome; ?></p>
        <p><strong>Matrícula:</strong> <?php echo $aluno->matricula; ?></p>
        <p><strong>CPF:</strong> <?php echo $aluno->cpf; ?></p>
        <p><strong>E-mail:</strong> <?php echo $aluno->email; ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo $aluno->data_nascimento; ?></p>
        <p><strong>Data de Criação:</strong> <?php echo $aluno->timestamp_criacao; ?></p>
        <p><strong>Data de Atualização:</strong> <?php echo $aluno->timestamp_update; ?></p>
        <a href="index.php?action=list-alunos" class="btn btn-primary">Voltar</a>
    </div>
</div>

