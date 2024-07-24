<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Professor</th>
            <th>Turno</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($turmas) && is_array($turmas)): ?>
            <?php foreach ($turmas as $turma): ?>
                <tr>
                    <td><?php echo $turma['id']; ?></td>
                    <td><?php echo $turma['nome']; ?></td>
                    <td><?php echo $turma['professor']; ?></td>
                    <td><?php echo $turma['turno']; ?></td>
                    <td>
                        <a href="index.php?action=read-turma&id=<?php echo $turma['id']; ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="index.php?action=edit-turma&id=<?php echo $turma['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete-turma&id=<?php echo $turma['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja deletar este turma?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum turma encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
