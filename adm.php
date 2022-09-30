<?php
include_once 'connect.php';
 
session_start();//Inicia ou recupera uma sessão que está em aberto

if (isset($_SESSION["nivel"])){
    if ($_SESSION["nivel"] == 1){?>
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
              

              <div class="container" >
               <div class="row text-center pt-5">
               <div class="col-md-6  p-0 ">
                   <a class="foto " href="agenda.php" data-toggle="tooltip" data-placement="top" title="Veja todos os serviços">
                     
                        <i class="fas fa-paint-brush p-5" style="font-size: 200px; color:#004b93; border-style: solid; border-radius:100%; border-color:#004b93;"></i>
                   </a>
                   <h4>Serviços</h4>
               </div>
               <div class="col-md-6  p-0 ">
                   <a class="foto" href="clientes.php" data-toggle="tooltip" data-placement="top" title="Veja todos os usuários cadastrados">
                    <i class="fas fa-users pr-4 pl-4 pt-5 pb-5" style="font-size: 200px; color: #0198da;border-style: solid; border-radius:100%; border-color:#0198da;"></i>
                   </a>
                   <h4 class="">Usuários</h4>
               </div>
               </div>
              </div>

             <?php include_once 'footer.php'?>   

              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
               <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


           </body>
       </html>
<?php  
}else {
     header('location:index.php');
}}else {
    header('location:index.php');
}
