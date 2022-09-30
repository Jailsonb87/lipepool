<?php
session_start();
include_once 'connect.php';
$idagenda = $_GET["idagenda"];

$sql = "delete from agenda where idagenda = '".$idagenda."';";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
 $row = mysqli_affected_rows($connect);
if( $row == 1){
    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Agenda deletada com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:agenda.php?msg");	
}else{
    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Erro ao deletar agenda!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
      header("location:agenda.php");
   
}



