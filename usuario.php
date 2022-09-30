<?php

include_once 'connect.php';
 
session_start();//Inicia ou recupera uma sessão que está em aberto
$id = $_SESSION['idcliente'];
//Mostra os dados da tabela clientes
$sql = "SELECT *FROM cliente  WHERE idcliente = '".$id."';";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);

if (isset($_SESSION["nivel"])){
    if ($_SESSION["nivel"] == 0){?>
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
            <div class="container ">
                <!-- Exibe mensagens-->
                <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
                ?>             
                <div class=" border rounded shadow-lg p-2 bg-white">
                    <div class="row justify-content-center p-3">
                        <div class="  col-md-6 col-sm-12 pb-4 ">
                            <div>
                                <h1 class="display-5 ">Olá, <?php echo $row['nome']; ?></h1>
                            </div>
                            <div> 
                                <p class="lead">Dados pessoais</p>
                                <hr class="my-2">
                            </div>
                            <div class="mt-2 "  > 
                                <a   data-toggle="modal" data-target="#exampleModal<?php echo $row['idcliente']; ?>" class="btn btn-sm float-right" style="color:white">Editar dados</a> 
                            </div>
                            <div class="">
                                <strong>Nome:</strong>  <?php echo $row['nome']; ?>
                            </div>
                            <div class="">
                                <strong>CPF:</strong>  <?php echo $row['cpf']; ?>
                            </div>
                            <div class="">
                                <strong>email:</strong>  <?php echo $row['email']; ?>
                            </div>
                            <div class="">
                                <strong>CEP:</strong>  <?php echo $row['cep']; ?>
                            </div>
                            <div class="" >
                                <strong>Bairro:</strong>  <?php echo $row['bairro']; ?>
                            </div>
                            <div class="">
                                <strong>Endereço:</strong>  <?php echo $row['endereco']; ?> n°: <?php echo $row['numero']; ?>
                            </div>
                            <div class="">
                                <strong>Telefone:</strong>  <?php echo $row['telefone']; ?>
                            </div>
                            <div class="">
                                <strong>Celular:</strong>  <?php echo $row['celular']; ?>
                            </div>
                        </div>
                        
                        
                        
                        <div class="  col-md-6 col-sm-12">
                            <nav class="navbar navbar-expand-sm navbar-light bg-light p-1">
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="nav navbar-nav nav-tabs">
                                  <li class="nav-item active">
                                   <a class="nav-link active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Agendados</a>

                                  </li>
                                  <li class="nav-item">
                                   <a class="nav-link" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Concluídos</a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                            <div class="row">
                      <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                               <?php
                           //Mostra os dados das 3 tabelas juntas
                            $db = "SELECT *FROM servico, cliente INNER JOIN agenda ON agenda.cliente = cliente.idcliente WHERE idcliente = '".$id."' and situacao_atual = 'Solicitado';";
                            $result = mysqli_query($connect, $db);
                            $totalRegistros = mysqli_num_rows($result);
                            if($totalRegistros >= 0){
                             ?>  
                                    <li class="list-group-item d-flex justify-content-between align-items-center col-sm-12  mt-2 mb-2 rounded">
                                        Total de Registros: 
                                        <span class="badge badge-primary badge-pill"><?php echo $totalRegistros;?></span>
                                    </li>
                                    <?php
                                while ($linha = mysqli_fetch_array($result)){
                                    if($linha > 0){
                                    echo"<div class='border rounded p-2 mb-2 shadow-sm'>
                                            <div>
                                            <p class='m-0'><strong>Serviço:  </strong>".$linha['nome_serv']."</p>
                                            </div>
                                            <div>  
                                                <p class='m-0'><strong>Data: </strong>" .$linha['data']."</p>
                                            </div>  
                                            <div> 
                                                <p class='m-0'><strong>Hora: </strong>" .$linha['hora']."</p>
                                            </div>
                                            <div>  
                                                <p class='m-0'><strong>Observações: </strong>" .$linha['observacoes']."</p>
                                            </div>
                                             
                                            <div>  
                                                <h4 class='m-0 text-primary'><strong class='text-dark'>Status: </strong>Solicitado</h4>
                                            </div>
                                        </div>
                                        ";
                                     
                                    }
                                   else {
                                    echo"<div>   
                                            <p class='m-0'><strong>Agenda: Nenhum serviço agendado</p>
                                            </div>";
                                   }
                                }
                                
                            }

                            ?>      
                            </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <?php
                           //Mostra os dados das 3 tabelas juntas
                            $db = "SELECT *FROM servico, cliente INNER JOIN agenda ON agenda.cliente = cliente.idcliente WHERE idcliente = '".$id."' and situacao_atual = 'Concluido';";
                            $result = mysqli_query($connect, $db);
                            $totalRegistros = mysqli_num_rows($result);
                            if($totalRegistros >= 0){
                             ?>  
                                    <li class="list-group-item d-flex justify-content-between align-items-center col-sm-12  mt-2 mb-2 rounded">
                                        Total de Registros: 
                                        <span class="badge badge-primary badge-pill"><?php echo $totalRegistros;?></span>
                                    </li>
                                    <?php
                                while ($linha = mysqli_fetch_array($result)){
                                    if($linha > 0){
                                    echo"<div class='border rounded p-2 mb-2 shadow-sm'>
                                            <div>
                                            <p class='m-0'><strong>Serviço:  </strong>".$linha['nome_serv']."</p>
                                            </div>
                                            <div>  
                                                <p class='m-0'><strong>Data: </strong>" .$linha['data']."</p>
                                            </div>  
                                            <div> 
                                                <p class='m-0'><strong>Hora: </strong>" .$linha['hora']."</p>
                                            </div>
                                            <div>  
                                                <p class='m-0'><strong>Observações: </strong>" .$linha['observacoes']."</p>
                                            </div>
                                            <div>  
                                                <h4 class='m-0 text-success'><strong class='text-dark'>Status: </strong>Concluído</h4>
                                            </div>
                                            
                                            ";
                                       
                                  echo "</div>
                                        ";
                                       
                                  
                                    }
                                  
                                }
                                
                            }

                            ?>
                          </div>
                        </div>
                      </div>

                </div> 

            </div>    
        </div>
        </div>
      <?php include_once 'modal_editar.php'?> 
    </div>   
      <?php include_once 'footer.php'?>   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="bootstrap/js/personalizado.js" type="text/javascript"></script>
    </body>
</html>
<?php  
}else {
     header('location:index.php');
}}else {
    header('location:index.php');
}
