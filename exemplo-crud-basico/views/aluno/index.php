<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($alunos) && is_array($alunos)): ?>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['matricula']; ?></td>
                    <td><?php echo $aluno['cpf']; ?></td>
                    <td><?php echo $aluno['email']; ?></td>
                    <td><?php echo $aluno['data_nascimento']; ?></td>
                    <td>
                        <a href="index.php?action=read-aluno&id=<?php echo $aluno['id']; ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="index.php?action=edit-aluno&id=<?php echo $aluno['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete-aluno&id=<?php echo $aluno['id']; ?>" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum aluno encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
