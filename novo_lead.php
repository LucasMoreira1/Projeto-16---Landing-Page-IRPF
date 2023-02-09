<?php
session_start();
require 'conexao.php';

if (isset($_POST['salvar_lead']))
{
    $name = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim($_POST['name']));
    $email = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim(($_POST['phone'])));
    $message = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim($_POST['message']));
    
    $sql = "INSERT INTO Leads (NOME, EMAIL, TELEFONE, MENSAGEM, DATA) VALUES ('$name', '$email', '$phone', '$message', NOW())";
    
    $query_run = mysqli_query($conexao_IMPOSTO_DE_RENDA, $sql);
    if($query_run)
    {
        $_SESSION['mensagem'] = "Dados enviados, em breve entraremos em contato!";
        header('Location: index.php#contact');
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Falha ao enviar os dados, verifique e tente novamente.";
        header('Location: index.php#contact');
        exit(0);
    }
}
