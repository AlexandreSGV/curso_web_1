<h1>Deletar Aluno</h1>
<p>Tem certeza que deseja deletar o aluno <?php echo $aluno->nome; ?>?</p>
<form action="index.php?action=delete-aluno&id=<?php echo $aluno->id; ?>" method="POST">
    <input type="submit" class="btn btn-danger" value="Deletar">
    <a href="index.php?action=list-alunos" class="btn btn-secondary">Cancelar</a>
</form>
