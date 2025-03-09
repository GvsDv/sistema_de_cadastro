<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $sql = "SELECT * FROM usuarios WHERE Id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "<script>alert('Erro ao buscar registro!'); window.location.href='visualizar.php';</script>";
        exit();
    }
} else {
    header("Location: visualizar.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $tarefas = $_POST['tarefas'];
    $id = $_POST['id'];

    try {
        $sql = "UPDATE usuarios SET Nome = :nome, Idade = :idade, Email = :email, Tarefas = :tarefas WHERE Id = :id";
        $stmt = $conexao->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tarefas', $tarefas);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='visualizar.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar dados!'); window.location.href='visualizar.php';</script>";
        }
    } catch(PDOException $e) {
        echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='visualizar.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container form">
        <h2>Editar Tarefa</h2>
        
        <a href="visualizar.php" class="voltar">Voltar para Lista</a>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['Id']; ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['Nome']); ?>" required>

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="<?php echo $usuario['Idade']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['Email']); ?>" required>

            <label for="tarefas">Tarefas:</label>
            <input type="text" id="tarefas" name="tarefas" value="<?php echo htmlspecialchars($usuario['Tarefas']); ?>" required>

            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html> 