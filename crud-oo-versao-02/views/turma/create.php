
<h1 class="my-4">Criar Turma</h1>
<form action="index.php?action=create-turma" method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="form-group">
        <label for="professor">Professor:</label>
        <input type="text" class="form-control" name="professor" required>
    </div>
    <div class="form-group">
        <label for="turno">Turno:</label>
        <input type="text" class="form-control" name="turno" required>
    </div>
    
    <input type="submit" class="btn btn-primary" value="Criar">
</form>
   