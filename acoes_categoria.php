<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_categoria'])) {
    $nome_categoria = mysqli_real_escape_string($conn, $_POST['nome_categoria']);
    $numero_categoria = mysqli_real_escape_string($conn, $_POST['numero_categoria']);

    $sql = "INSERT INTO lista_categoria (nome_categoria, numero_categoria) 
            VALUES ('$nome_categoria', '$numero_categoria')";

    if (mysqli_query($conn, $sql)) {
        header('Location: lista.php');
        exit();
    } else {
        echo "Erro ao inserir a categoria: " . mysqli_error($conn);
    }
}

?>