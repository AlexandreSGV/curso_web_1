<!-- views/turma/show.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Turma</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Detalhes da Turma</h1>
    <p>ID: <?php echo $this->turma->id; ?></p>
    <p>Nome: <?php echo $this->turma->nome; ?></p>
    <p>Turno: <?php echo $this->turma->turno; ?></p>
    <p>Nome do Professor: <?php echo $this->turma->nome_professor; ?></p>
    <p>Data de Criação: <?php echo $this->turma->timestamp_criacao; ?></p>
    <p>Data de Atualização: <?php echo $this->turma->timestamp_update; ?></p>
    <a href="index.php">Voltar</a>
</body>
</html>
