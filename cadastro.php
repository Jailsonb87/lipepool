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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="bootstrap/js/jquery.mask.min.js" type="text/javascript"></script>			
        <script src="bootstrap/js/validate.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="icones_menu.css" rel="stylesheet" type="text/css"/>
    </head>
  
   
   
    <body class="bg-light">
       <?php include_once 'cabecalho.php'?>
    
       <div class="container ">
           <form action="cadastrar.php" method="post" id="formulario" class="border rounded p-4 col-md-9 col-lg-6 shadow-lg p-3 mb-5 bg-white">       
            <!-- Exibe mensagens de erro  -->
            <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
            ?>
            <h1 class="text-center">Cadastre-se</h1>
           <hr>
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="Nome" class="form-control " id="nome" name="nome" placeholder="Nome completo"required>
              
            </div>    
             <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control  " id="cpf" name="cpf" required>
              
            </div>    
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control " id="email" name="email" placeholder="usuario@gmail.com" required>
            </div>
           
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira uma senha " required>
            </div>
           <div class="row">
                <div class="form-group col-6">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="" required>
                </div>
                <div class="form-group col-6">
                  <label for="cep">CEP</label>
                  <input type="text" class="form-control" id="cep" name="cep" placeholder="" required>
                </div>  
            </div>
           <div class="row">
            <div class="form-group col-10">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, Av., viela" required>
            </div>
            <div class="form-group col-2">
              <label for="numero">N°</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="123" required>
            </div>   
           </div>    
           <div class="row">
                <div class="form-group col-6">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00)0000-0000" required>           
                </div>
                <div class="form-group col-6">
                  <label for="celular">Celular</label>
                  <input type="text" class="form-control" id="celular" name="celular" placeholder="(00)00000-0000" required>           
                </div>   
            </div>
            <div class="form-group">
            <button type="submit" class="btn float-right">Cadastrar</button>
             </div> 
           
          
            
        </form>
           
          

      </div>
       <?php include_once 'footer.php'?>
        
        
    </body>
    
</html>
<?php
}else {
     header('location:index.php');
}