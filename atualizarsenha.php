<?php
session_start();
include_once 'connect.php';    
    $senha = md5($_POST["senha"]);
    $senhadois = md5($_POST["senhadois"]);
  
  if ($senha!= $senhadois){
    echo "<script language='javascript' type='text/javascript'>alert('As senhas estão diferentes');window.location.href='login.php'</script>";
    
  }else{
    $idcli = $_SESSION["idcliente"];
    
    $sql = "UPDATE cliente SET senha='".$senha."' WHERE idcliente='".$idcli."';";      

    $result = mysqli_query($connect, $sql)  or die(mysqli_error($connect));

    $row = mysqli_affected_rows($connect);
        if ($row == 1){
        $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Senha alterada com sucesso!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
            header("location:login.php");
        }else{
            echo 'erro';
        $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
             . "ERRO ao alterar senha!"
                 . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                     . "<span aria-hidden='true'>&times;</span>"
                 . "</button>"
             . "</div>";
        header("location:login.php");
         
         
         
        }
    }

                 

mysqli_close($connect);
?>   