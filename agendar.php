<?php
include_once 'connect.php';
 
session_start();//Inicia ou recupera uma sessão que está em aberto

if (isset($_SESSION["nivel"])){
    if ($_SESSION["nivel"]  == 0 ){?>
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

        <body>
           <?php include_once 'cabecalho.php'?>
            


           <div class="container ">

               <form action="agendamento.php" method="POST" id="formulario" class=" border rounded bg-light col-md-9 col-lg-6 p-4">       
                <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
                ?>
                <h1 class="text-center">Agendar Serviço</h1>
               <hr>

               <div class="row"> 
                <div class="form-group col-6">
                  <label for="data">Data</label>
                  <input type="date" class="form-control" id="data" name="data" placeholder="DD/MM/AAAA" required>
                </div>
                <div class="form-group col-6">
                    <label for="data">Hora:</label>
                  <select class="custom-select" id="inputGroupSelect01" name="hora">
                    <option selected disabled>00:00</option>
                    <option value="08:00:00">08:00</option>
                    <option value="10:00:00">10:00</option>  
                    <option value="13:00:00">13:00</option>
                    <option value="15:00:00">15:00</option>
                    <option value="17:00:00">17:00</option>
                    <option value="19:00:00">19:00</option>
                  </select>
                </div>
               </div>
                <div class="form-group">
                  <label for="tipodeservico">Observações</label>
                   <textarea class="form-control" id="observacao" name="observacoes" rows="3" required></textarea>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn float-right cadastrar" >Agendar</button>
                 </div> 

            </form>



        </div> 
          <?php include_once 'footer.php'?>   


            <script src=jquery/jquery-3.3.1.min.js></script>
            <script src="popper/popper.min.js" ></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            
            <script>

            </script>
        </body>
    </html>
<?php  
}else {
    $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Somente usuários podem agendar serviço!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>"; 
     header("location:servicos.php");
    
}}else {
     $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'>"
                     . "Você precisa estar logado para agendar serviço! <a href='login.php'  class='alert-link'> Login</a> / <a href='cadastro.php' class='alert-link'>Cadastre-se</a>"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
     header("Location:servicos.php");
}