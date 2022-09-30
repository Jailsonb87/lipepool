<?php
session_start();
include_once 'connect.php';
$id = $_GET["id"];

$sql = "delete from cliente where idcliente = '".$id."';";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
 $row = mysqli_affected_rows($connect);
if( $row == 1){
    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Cliente deletado com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:clientes.php?msg");	
}else{
    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Cliente não pode ser deletado!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:clientes.php");
   
}



