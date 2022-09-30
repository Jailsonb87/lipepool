<?php
include_once 'connect.php';
 
session_start();//Inicia ou recupera uma sessão que está em aberto

if (!isset($_SESSION["nivel"])){?>
        <!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="icones_menu.css" rel="stylesheet" type="text/css"/>
    </head>
  
    <body class="bg-light">
       
       <?php include_once 'cabecalho.php'?>
        <?php include_once 'recuperacao.php'?>
        <div class="container">
            <div class="form-group">
             <form action="logar.php" method="post" class="rounded mt-5 mx-auto p-4 border shadow-lg bg-white" style="width: 400px;  overflow: hidden;">
              <div class="form-group">
                <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
                ?>
                <h3 class=" text-center">Efetuar login</h3>
                <label for="text">Email:</label>
                <input type="email" class="form-control"  name="email" placeholder="Usuário" required="">
              </div>
              <div class="form-group">
                <label for="password">Senha:</label>
                <div class="input-group">  
                    <input type="password" class="form-control"  name="senha" id="senha" placeholder="Senha" required="">
                  <div class="input-group-append">
                    <button class="btn btn-outline-info btn-sm" type="button" onclick="mostrarSenha()"><i class="fa fa-eye"></i></button>
                  </div>
                </div>
               </div>  
                 
              <div class="form-check">
              <input type="checkbox" class="form-check-input" id="dropdownCheck">
              <label class="form-check-label" for="dropdownCheck">
                Relembrar senha
              </label>
            </div>
            <button type="submit" name="entrar" value="entrar" class="btn mt-4">Entrar</button>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="cadastro.php">Cadastre-se</a>
              <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Esqueci minha senha</a>
            </form>
             
        </div>
        </div>
        <?php include_once 'footer.php'?> 
      
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
            function mostrarSenha(){
                    var tipo = document.getElementById("senha");
                    if(tipo.type == "password"){
                            tipo.type = "text";
                    }else{
                            tipo.type = "password";
                    }
            }
        </script>
    </body>
</html>       

<?php  
}else {
     header('location:index.php');
}
