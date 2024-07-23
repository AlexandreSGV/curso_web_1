
<h1 class="my-4">Criar Aluno</h1>
<form action="index.php?action=create-aluno" method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="form-group">
        <label for="matricula">Matrícula:</label>
        <input type="text" class="form-control" name="matricula" required>
    </div>
    <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" class="form-control" name="cpf" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" class="form-control" name="data_nascimento" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar">
</form>
   