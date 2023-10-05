<?php

include 'config.php';



if (isset($_GET['contato'])) {
    $id = mysqli_escape_string($conexao,$_GET['contato']);
    $sql = mysqli_query($conexao,"DELETE FROM contato WHERE id = '$id'");
    if ($sql) {
        $_SESSION['msg'] = "Contato deletado";
        $_SESSION['status'] = "alert-success";
        header('location:index.php');
        die;
    }else{
        echo "erro".mysqli_error($conexao);
    }
}

if (isset($_GET['usuario'])) {
    $id = mysqli_escape_string($conexao,$_GET['usuario']);
    $sql = mysqli_query($conexao,"DELETE FROM usuario WHERE id = '$id'");
    if ($sql) {
        $_SESSION['msg'] = "usúario deletado";
        $_SESSION['status'] = "alert-success";
        header('location:index.php');
        die;
    }else{
        echo "erro".mysqli_error($conexao);
    }
}
