<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM usuarios WHERE Id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Registro deletado com sucesso!'); window.location.href='visualizar.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar registro!'); window.location.href='visualizar.php';</script>";
        }
    } catch(PDOException $e) {
        echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='visualizar.php';</script>";
    }
} else {
    header("Location: visualizar.php");
}
?> 