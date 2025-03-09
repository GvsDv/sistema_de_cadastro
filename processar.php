<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $tarefas = $_POST['tarefas'];

    try {
        $sql = "INSERT INTO usuarios (Nome, Idade, Email, Tarefas) VALUES (:nome, :idade, :email, :tarefas)";
        $stmt = $conexao->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tarefas', $tarefas);

        if ($stmt->execute()) {
            echo "<script>alert('Dados cadastrados com sucesso!'); window.location.href='visualizar.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar dados!'); window.location.href='visualizar.php';</script>";
        }
    } catch(PDOException $e) {
        echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='index.php';</script>";
    }
}
?> 