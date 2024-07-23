<h1 class="my-4">Detalhes do Turma</h1>
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

