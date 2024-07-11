<!-- views/aluno/show.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Detalhes do Aluno</h1>
    <p>ID: <?php echo $this->aluno->id; ?></p>
    <p>Nome: <?php echo $this->aluno->nome; ?></p>
    <p>Matrícula: <?php echo $this->aluno->matricula; ?></p>
    <p>CPF: <?php echo $this->aluno->cpf; ?></p>
    <p>E-mail: <?php echo $this->aluno->email; ?></p>
    <p>Data de Nascimento: <?php echo $this->aluno->data_nascimento; ?></p>
    <p>Data de Criação: <?php echo $this->aluno->timestamp_criacao; ?></p>
    <p>Data de Atualização: <?php echo $this->aluno->timestamp_update; ?></p>
    <a href="index.php">Voltar</a>
</body>
</html>
