<?php 
session_start(); 

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
@$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
@$nivel = $_POST['nivel'];




include_once 'connect.php';

$db = mysqli_select_db($connect, 'lipepool');

$query = "SELECT email FROM cliente WHERE email = '$email'";

$select = mysqli_query($connect, $query);

$array = mysqli_fetch_array($select);

$logarray = $array['email'];
 
  if($email == "" || $email == null){
       $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "O campo email deve ser preenchido!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php");
    }else{
        if($logarray == $email){
            $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Esse email já existe!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php");
        }else{
        
            $query = "INSERT INTO cliente  VALUES(null,'".$nome."','".$cpf."','".$email."','".$senha."','".$cep."','".$bairro."', '".$endereco."', '".$numero."', '".@$telefone."','".$celular."', '".@$nivel."')";

            $inserir = mysqli_query($connect, $query);

            if($inserir){
                $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Usuário cadastrado com sucesso!!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php");            
            }else{
                $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Não foi possível cadastrar esse usuário!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
           header("location:cadastro.php"); 
            }
        }
    }
?>