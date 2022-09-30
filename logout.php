<?php
//Arquivo logout
session_start();//Recupero a sessão para poder usá-la
unset($_SESSION['nome']);//Encerra a sessão
unset($_SESSION['nivel']);//Encerra a sessão
header('location:index.php'); //Redireciona para a página inicial
?>