<h1 class="my-4">Detalhes da Turma</h1>
<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> <?php echo $turma->id; ?></p>
        <p><strong>Nome:</strong> <?php echo $turma->nome; ?></p>
        <p><strong>Professor:</strong> <?php echo $turma->professor; ?></p>
        <p><strong>Turno:</strong> <?php echo $turma->turno; ?></p>
        <p><strong>Data de Criação:</strong> <?php echo $turma->timestamp_criacao; ?></p>
        <p><strong>Data de Atualização:</strong> <?php echo $turma->timestamp_update; ?></p>
        <a href="index.php?action=list-turmas" class="btn btn-primary">Voltar</a>
    </div>
</div>


<h2 class="my-4">Matricular Aluno na Turma</h2>
<div class="card mb-4">
    <div class="card-body">
        <?php if (empty($alunos_disponiveis)): ?>
            <p class="text-danger">Não há alunos disponíveis para matrícula.</p>
        <?php else: ?>
            <form action="index.php?action=matricular_v2" method="POST">
                <input type="hidden" name="turma_id" value="<?php echo $turma->id; ?>">
                <div class="form-group">
                    <label for="aluno_id">Selecione o Aluno</label>
                    <select class="form-control" id="aluno_id" name="aluno_id" required>
                        <?php foreach ($alunos_disponiveis as $aluno): ?>
                            <option value="<?php echo $aluno['id']; ?>">
                                <?php echo $aluno['id'] . ' - ' . $aluno['nome']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Matricular</button>
            </form>
        <?php endif; ?>
    </div>
</div>


<h2 class="my-4">Alunos na Turma</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alunos_matriculados as $aluno): ?>
            <tr>
                <td><?php echo $aluno['id']; ?></td>
                <td><?php echo $aluno['nome']; ?></td>
                <td><?php echo $aluno['matricula']; ?></td>
                <td><?php echo $aluno['email']; ?></td>
                <td>
                    <a href="index.php?action=desmatricular&aluno_id=<?php echo $aluno['id']; ?>&turma_id=<?php echo $turma->id; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Desmatricular
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>