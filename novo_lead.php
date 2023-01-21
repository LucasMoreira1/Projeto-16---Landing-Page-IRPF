<?php
session_start();
include('conexao.php');


$name = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim($_POST['name']));
$email = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim($_POST['email']));
$phone = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim(md5($_POST['phone'])));
$message = mysqli_real_escape_string($conexao_IMPOSTO_DE_RENDA, trim(md5($_POST['message'])));

$sql = "INSERT INTO Leads (NOME, EMAIL, TELEFONE, MENSAGEM, DATA) VALUES ('$name', '$email', '$phone', '$message', NOW())";

if($conexao_ADV_MOREIRA_CESAR->query($sql) === TRUE){
    $_SESSION['cadastro_realizado'] = true;
}
$conexao_ADV_MOREIRA_CESAR->close();
header('Location: index.php');
exit;