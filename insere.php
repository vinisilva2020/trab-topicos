<?php
include 'config.php';
session_start();
// cadastro de contatos
if (isset($_POST['cadastrar-contato'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $telefone = mysqli_escape_string($conexao, $_POST['telefone']);
    $email = mysqli_escape_string($conexao, $_POST['email']);

    if ($id == "") {
        $sql = "INSERT INTO contato(nome,telefone,email) VALUES ('$nome','$telefone','$email')";
    } else {
        $sql = "UPDATE contato SET nome = '$nome', telefone = '$telefone' , email = '$email' WHERE id = '$id'";
    }
    $execute = mysqli_query($conexao, $sql);
    if ($execute == TRUE) {
        $_SESSION['msg'] = "Contato cadastrado!";
        $_SESSION['status'] = "alert-success";
        header('location:painel.php');
    } else {
        $_SESSION['msg'] = "Erro ao cadastrar!";
        $_SESSION['status'] = "alert-danger";
        header('location:painel.php');
    }
}
if (isset($_POST['cadastrar-usuario'])) {
    $id = mysqli_escape_string($conexao,$_POST['id']);
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $senha = mysqli_escape_string($conexao,$_POST['senha']);
    $senha = password_hash($senha,PASSWORD_DEFAULT);

    if ($id == "") {
        $sql = "INSERT INTO usuario(nome,senha) VALUES ('$nome','$senha')";
    } else {
        $sql = "UPDATE usuario SET nome = '$nome', senha = '$senha'  WHERE id = '$id'";
    }
    $execute = mysqli_query($conexao,$sql);
    if ($execute == TRUE) {
        $_SESSION['msg'] = "Usúario cadastrado com sucesso";
        $_SESSION['status'] = "alert-success";
        header('location:index.php');
        die;
    }else {
        $_SESSION['msg'] = "Erro ao cadastrar usúario";
        $_SESSION['status'] = "alert-danger";
        header('location:index.php');
        die;
    } 
    }
if (isset($_GET['del_contato'])) {
    $id = mysqli_escape_string($conexao,$_GET['del_contato']);
    $sql = mysqli_query($conexao,"DELETE FROM contato WHERE id = '$id'");
    if ($sql == TRUE) {
        $_SESSION['msg'] = "Contato excluido";
        $_SESSION['status'] = "alert-success";
        header('location:painel.php');
        die;
    }else{
        $_SESSION['msg'] = "Erro ao deletar contato";
        $_SESSION['status'] = "alert-danger";
        header('location:painel.php');
        die;
    }
}
if (isset($_GET['del_usuario'])) {
    $id = mysqli_escape_string($conexao,$_GET['del_usuario']);
    $sql = mysqli_query($conexao,"DELETE FROM usuario WHERE id = '$id'");
    if ($sql == TRUE) {
        $_SESSION['msg'] = "Perfil excluido";
        $_SESSION['status'] = "alert-success";
        header('location:index.php');
        die;
    }else{
        $_SESSION['msg'] = "Erro ao deletar perfil";
        $_SESSION['status'] = "alert-danger";
        header('location:index.php');
        die;
    }
}

