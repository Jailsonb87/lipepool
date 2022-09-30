<?php
session_start();
include_once 'connect.php';
if ($_POST){
$email = $_POST["email"];
$celular = $_POST["celular"];

$sql = "Select * from cliente where email = '".$email."' and celular ='".$celular."';";
$result = mysqli_query($connect, $sql) or die (mysqli_error($connect));
  $row = mysqli_fetch_array($result);
   $_SESSION["idcliente"] = $row["idcliente"];
   
if (mysqli_num_rows($result) == 1 ) {
    
    ?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="icones_menu.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php include_once 'cabecalho.php'?>  
        <div id="" class="container bg-white mb-5">       
           <form action="atualizarsenha.php" class="border rounded p-4 col-md-9 col-lg-6 shadow-lg p-3 mb-5 bg-white mx-auto" method="POST">
             <h1 class="text-center">Recuperação de Senha</h1>   
            <div class="form-group mt-5">
              <label for="senha">Nova Senha</label>
              <input type="password" name="senha" class="form-control" id="senha" placeholder="Ex: 1234">
            </div>
            <div class="form-group">
              <label for="senhadois">Digite novamente a senha</label>
              <input type="password" name="senhadois" class="form-control" id="senhadois"  placeholder="Mesma senha digitada acima">
            </div>
            <button type="submit" class="btn float-right">Enviar</button>
          </form>
        </div>
        <?php include_once 'footer.php'?> 
      
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>  

  <?php
    }else{
        echo "<script language='javascript' type='text/javascript'>alert('Email ou celular não cadastrado');window.location.href='cadastro.php'</script>";
}}?>
