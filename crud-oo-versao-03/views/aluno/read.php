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

<h2 class="my-4">Turmas em que está Matriculado</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Turno</th>
            <th>Professor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($turmas as $turma): ?>
            <tr>
                <td><?php echo $turma['id']; ?></td>
                <td><a href="index.php?action=read-turma&id=<?php echo $turma['id']; ?>"><?php echo $turma['nome']; ?></a></td>
                <td><?php echo $turma['turno']; ?></td>
                <td><?php echo $turma['professor']; ?></td>
                <td>
                    <a href="index.php?action=desmatricular&aluno_id=<?php echo $aluno->id; ?>&turma_id=<?php echo $turma['id']; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Desmatricular
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
