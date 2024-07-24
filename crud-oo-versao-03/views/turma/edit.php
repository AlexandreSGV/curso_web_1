<h1>Editar Turma</h1>
<form action="index.php?action=edit-turma&id=<?php echo $turma->id; ?>" method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $turma->nome; ?>" required>
    </div>
    <div class="form-group">
        <label for="professor">Professor:</label>
        <input type="text" class="form-control" name="professor" value="<?php echo $turma->professor; ?>" required>
    </div>
    <div class="form-group">
        <label for="turno">Turno:</label>
        <input type="text" class="form-control" name="turno" value="<?php echo $turma->turno; ?>" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>
