   <?php
        include_once 'connect.php';
        session_start();
        
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        
        $sql = "Select * from cliente where email = '".$email."' and senha = '".$senha."';";
        
        $result = mysqli_query($connect, $sql);
        $totalresult = mysqli_num_rows($result);
        
        if ($result){
            if ( $totalresult == 1){
               $row = mysqli_fetch_array($result);
               $_SESSION["nome"] = $row["nome"];
               $_SESSION["idcliente"] = $row["idcliente"];
               $_SESSION["email"] = $row["email"];
               $_SESSION["nivel"] = $row["nivel"];
               header("location:index.php");
            }else{
                $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Usuário ou senha incorretos!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
        header("location:login.php");
            }
        }else{
         $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Não executou a query!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
        header("location:login.php");
          
        }
        






/*
//Arquivo logar.php  
include_once 'connect.php';
session_start();

$email = $_POST["email"];
$senha = md5($_POST["senha"]);  

if($email!="" && $senha !=""){
    //echo"usuário está logado"
   $sql = "SELECT * FROM cliente WHERE email='".$email."' AND senha='".$senha."'";
   $result = mysqli_query($connect,$sql) or die (mysqli_error($connect));
   
   if (mysqli_num_rows($result) == 1){
       $line = mysqli_fetch_array($result);
        $_SESSION["id"] = $line["idcliente"];
        $_SESSION['email'] = $line["email"];
        $_SESSION['nome'] = $line["nome"];
        $_SESSION['nivel'] = $line["nivel"];
        
        header('location:index.php');
            
   }
   else{
       $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Usuário ou senha incorretos!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
        header("location:login.php");
      
          
}}

*/
