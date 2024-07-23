<h1>Editar Aluno</h1>
<form action="index.php?action=edit-aluno&id=<?php echo $aluno->id; ?>" method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $aluno->nome; ?>" required>
    </div>
    <div class="form-group">
        <label for="matricula">Matrícula:</label>
        <input type="text" class="form-control" name="matricula" value="<?php echo $aluno->matricula; ?>" required>
    </div>
    <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" class="form-control" name="cpf" value="<?php echo $aluno->cpf; ?>" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" name="email" value="<?php echo $aluno->email; ?>" required>
    </div>
    <div class="form-group">
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" class="form-control" name="data_nascimento" value="<?php echo $aluno->data_nascimento; ?>" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>
