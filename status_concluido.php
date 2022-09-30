<?php 

include_once 'connect.php';

session_start();
$idagenda = $_GET["idagenda"];

$sql = "update agenda SET situacao_atual = 'Concluido' WHERE idagenda = '".$idagenda."';";
 $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
 $row = mysqli_affected_rows($connect);
if( $row == 1){
    header("location:agenda.php");
      	
}else{
    header("location:agenda.php");
    	
}
