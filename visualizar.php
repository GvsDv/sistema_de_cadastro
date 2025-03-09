<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Tarefas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tarefas Cadastradas</h2>
        
        <a href="index.php" class="voltar">Voltar para Cadastro</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Tarefas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'conexao.php';

                try {
                    $sql = "SELECT * FROM usuarios ORDER BY Id DESC";
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['Id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['Nome']) . "</td>";
                        echo "<td>" . $row['Idade'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Tarefas']) . "</td>";
                        echo "<td>
                                <a href='editar.php?id=" . $row['Id'] . "' class='btn-editar'>Editar</a>
                                <a href='#' onclick='confirmarDelete(" . $row['Id'] . ")' class='btn-deletar'>Deletar</a>
                              </td>";
                        echo "</tr>";
                    }
                } catch(PDOException $e) {
                    echo "<tr><td colspan='6'>Erro ao buscar dados: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function confirmarDelete(id) {
        if (confirm('Tem certeza que deseja deletar este registro?')) {
            window.location.href = 'deletar.php?id=' + id;
        }
    }
    </script>
</body>
</html> 