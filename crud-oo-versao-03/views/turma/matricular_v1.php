<h1 class="my-4">Matricular Aluno na Turma</h1>
<div class="card">
    <div class="card-body">
        <form action="index.php?action=matricular_v1" method="POST">
            <div class="form-group">
                <label for="turma_id">ID da Turma</label>
                <input type="number" class="form-control" id="turma_id" name="turma_id" required>
            </div>
            <div class="form-group">
                <label for="aluno_id">ID do Aluno</label>
                <input type="number" class="form-control" id="aluno_id" name="aluno_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Matricular</button>
        </form>
        <a href="index.php?action=list-turmas" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
