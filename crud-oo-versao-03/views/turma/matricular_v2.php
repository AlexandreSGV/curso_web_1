<h1 class="my-4">Matricular Aluno na Turma (Versão 2)</h1>
<div class="card">
    <div class="card-body">
        <form action="index.php?action=matricular_v2" method="POST">
            <div class="form-group">
                <label for="turma_id">Selecione a Turma</label>
                <select class="form-control" id="turma_id" name="turma_id" required>
                    <?php foreach ($turmas as $turma): ?>
                        <option value="<?php echo $turma['id']; ?>">
                            <?php echo $turma['id'] . ' - ' . $turma['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="aluno_id">Selecione o Aluno</label>
                <select class="form-control" id="aluno_id" name="aluno_id" required>
                    <?php foreach ($alunos as $aluno): ?>
                        <option value="<?php echo $aluno['id']; ?>">
                            <?php echo $aluno['id'] . ' - ' . $aluno['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Matricular</button>
        </form>
        <a href="index.php?action=list-turmas" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
