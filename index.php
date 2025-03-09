<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de tarefas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container form">
        <h2>Cadastro de Tarefas</h2>
        <!--a href="visualizar.php" class="voltar">Visualizar Tarefas Cadastradas</a-->

        <form action="processar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="tarefas">Tarefas:</label>
            <input type="text" id="tarefas" name="tarefas" required>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>