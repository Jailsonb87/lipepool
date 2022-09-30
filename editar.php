<?php 

include_once 'connect.php';
session_start();
$usuario = $_SESSION['email'];

$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);


$sql = "update cliente SET cep='$cep', bairro='$bairro', endereco='$endereco', numero='$numero', telefone='$telefone', celular='$celular'  WHERE email = '$usuario'";

 $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
 
 $row = mysqli_affected_rows($connect);
if( $row == 1){
    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Dados editados com sucesso!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:usuario.php");
      	
}else{

    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Erro ao editar dados!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:usuario.php");
    	
}
