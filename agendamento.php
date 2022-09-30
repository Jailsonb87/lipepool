<?php
        include_once 'connect.php';
        session_start();
        $data = $_POST["data"];
        $hora = $_POST["hora"];
        $observacoes = $_POST["observacoes"];
        $query = "select * from agenda where data = '".$data."' and hora = '".$hora."';";
        
        $result = mysqli_query($connect, $query);
        if ($result){
            if (mysqli_num_rows($result) == 1){
                $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Hora reservada! Escolha outra hora!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
                    header("location:agendar.php");
            }else{
                
                $idcli = $_SESSION["idcliente"];
                $serv = 1;
                $sql = "insert into agenda (data, hora, observacoes, cliente, servico) values ('".$data."', '".$hora."','".$observacoes."',".$idcli.",".$serv.");";
                $result = mysqli_query($connect, $sql);  
                if($result){
                    $_SESSION['msg'] ="<div class='alert alert-success' role='alert'>"
                     . "Agendamento concluido com sucesso!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
                    header("location:agendar.php");
                }else{
                    $erro = mysqli_error($connect);
                    echo $sql.$erro;
                }
        }}
     
