<?php

include_once 'connect.php';
 
session_start();//Inicia ou recupera uma sessão que está em aberto
$id = $_SESSION['idcliente'];

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
    <body class="">
        <?php include_once 'cabecalho.php'?>
        
        <div class="container ">
                <!-- Exibe mensagens-->
                <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
                ?>
         <?php include_once("connect.php");?>
                
                
            
                <div class=" border rounded shadow-lg p-2 mb-3 bg-white">
                    <nav class="navbar navbar-expand-md navbar-light bg-light">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav nav-tabs">
                          <li class="nav-item active">
                           <a class="nav-link active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Todos os seviços</a>
                     
                          </li>
                          <li class="nav-item">
                           <a class="nav-link" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Serviços em aberto</a>

                          </li>
                          <li class="nav-item">
                           <a class="nav-link" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Serviços concluidos</a>
                      
                          </li>
                          
                        </ul>
                      </div>
                    </nav>
                    <div class="row">
                      <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                
                                    <?php 
                                     if(!isset($_GET['pesquisar'])){
                                            header("Location: agenda.php");
                                    }else{
                                            $valor_pesquisar = $_GET['pesquisar'];
                                    }
                                    //Selecionar todas as tabelas
                                    $select = "SELECT *FROM servico, cliente INNER JOIN agenda ON agenda.cliente = cliente.idcliente WHERE servico >0 and nome LIKE '%$valor_pesquisar%' order by data ;";
                                    $query = mysqli_query($connect, $select);

                                    //Contar o total de serviços
                                     $totalRegistros = mysqli_num_rows($query);
                                    
                                    
                                    ?>
                                     <nav class="navbar navbar-light bg-light">
                                      <a class="navbar-brand">
                                          Serviços
                                      <span class="badge badge-primary badge-pill"><?php echo $totalRegistros;?></span>
                                      </a>
                                         <a href="agenda.php"class="nav-link border rounded border-primary pr-1 pl-1 pb-1 pt-1 ">Voltar</a>
                                      <form class="form-inline " method="GET" action="agenda_pesquisa.php">
                                          <input class="form-control mr-sm-2" name="pesquisar" type="search" value="<?php echo $valor_pesquisar;?>" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                      </form>
                                    </nav>    
                                <?php while($line = mysqli_fetch_array($query)){ ?>   
                                        <div class="row justify-content-center">
                                            <div class="  col-md-12 col-sm-12 pb-4">
                                                <?php
                                                echo"<div class='border rounded p-2 shadow-sm'>
                                                        <div>
                                                            <p class='m-0'><strong>Nome:  </strong>".$line['nome']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Email: </strong>" .$line['email']."</p>
                                                        </div>
                                                        <div>
                                                            <p class='m-0'><strong>Serviço:  </strong>".$line['nome_serv']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Data: </strong>" .$line['data']."</p>
                                                        </div>  
                                                        <div> 
                                                            <p class='m-0'><strong>Hora: </strong>" .$line['hora']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Observações: </strong>" .$line['observacoes']."</p>
                                                        </div>";
                                                        if ($line["situacao_atual"] == "Concluido"){
                                                    echo "<div>  
                                                            <h4 class='m-0 text-success'><strong class='text-dark'>Status: </strong>" .$line['situacao_atual']."</h4>
                                                        </div>
                                                        ";
                                                    } elseif ($line["situacao_atual"] == "Solicitado"){
                                                        echo "<div>  
                                                            <h4 class='m-0 text-primary'><strong class='text-dark'>Status: </strong>" .$line['situacao_atual']."</h4>
                                                        </div>
                                                        ";
                                                    }
                                                    
                                                    if ($line["situacao_atual"] == "Solicitado"){
                                                    echo"<div>
                                                            <a class='float-left mt-2' href='status_concluido.php? idagenda=" . $line['idagenda'] . "'><button type='button' class='btn btn-sm'>Marcar como concluido</button></a>
                                                        </div>";
                                                    }
                                                    echo"<div>
                                                           <a class=' float-right mr-2 mt-2' href='deletar_servico.php? idagenda=" . $line['idagenda'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></i></a>                                                   
                                                       </div>
                                                    </div>
                                                    ";
                                                ?>
                                            </div> 
                                        </div>
                                <?php } ?>     
                            </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                
                              <?php 
                                     if(!isset($_GET['pesquisar'])){
                                            header("Location: agenda.php");
                                    }else{
                                            $valor_pesquisar = $_GET['pesquisar'];
                                    }
                                    //Selecionar todas as tabelas
                                    $select = "SELECT *FROM servico, cliente INNER JOIN agenda ON agenda.cliente = cliente.idcliente WHERE servico >0 and nome LIKE '%$valor_pesquisar%' and situacao_atual = 'Solicitado' order by data ;";
                                    $query = mysqli_query($connect, $select);

                                    //Contar o total de serviços
                                     $totalRegistros = mysqli_num_rows($query);
                                    
                                    
                                    ?>
                                     <nav class="navbar navbar-light bg-light">
                                      <a class="navbar-brand">
                                          Serviços
                                      <span class="badge badge-primary badge-pill"><?php echo $totalRegistros;?></span>
                                      </a> 
                                         <a href="agenda.php"class="nav-link border rounded border-primary pr-1 pl-1 pb-1 pt-1">Voltar</a>
                                      <form class="form-inline " method="GET" action="agenda_pesquisa.php">
                                          <input class="form-control mr-sm-2" name="pesquisar" type="search" value="<?php echo $valor_pesquisar;?>" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                      </form>
                                    </nav>    
                                <?php while($line = mysqli_fetch_array($query)){ ?>   
                                        <div class="row justify-content-center">
                                            <div class="  col-md-12 col-sm-12 pb-4">
                                                <?php
                                                echo"<div class='border rounded p-2 shadow-sm'>
                                                        <div>
                                                            <p class='m-0'><strong>Nome:  </strong>".$line['nome']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Email: </strong>" .$line['email']."</p>
                                                        </div>
                                                        <div>
                                                            <p class='m-0'><strong>Serviço:  </strong>".$line['nome_serv']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Data: </strong>" .$line['data']."</p>
                                                        </div>  
                                                        <div> 
                                                            <p class='m-0'><strong>Hora: </strong>" .$line['hora']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Observações: </strong>" .$line['observacoes']."</p>
                                                        </div>
                                                        <div>  
                                                            <h4 class='m-0 text-primary'><strong class='text-dark'>Status: </strong>" .$line['situacao_atual']."</h4>
                                                        </div>
                                                        <div>
                                                            <a class='float-left mt-2' href='status.php? idagenda=" . $line['idagenda'] . "'><button type='button' class='btn  btn-sm'>Marcar como concluido</button></a>
                                                        </div>
                                                        <div>
                                                           <a class=' float-right mr-2 mt-2' href='deletar_servico.php? idagenda=" . $line['idagenda'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></i></a>                                                   
                                                       </div>
                                                    </div>
                                                    ";
                                                ?>
                                            </div> 
                                        </div>
                                <?php } ?>
                          </div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"> 
                             
                              <?php 
                                     if(!isset($_GET['pesquisar'])){
                                            header("Location: agenda.php");
                                    }else{
                                            $valor_pesquisar = $_GET['pesquisar'];
                                    }
                                    //Selecionar todas as tabelas
                                    $select = "SELECT *FROM servico, cliente INNER JOIN agenda ON agenda.cliente = cliente.idcliente WHERE servico >0 and nome LIKE '%$valor_pesquisar%' and situacao_atual = 'Concluido' order by data ;";
                                    $query = mysqli_query($connect, $select);

                                    //Contar o total de serviços
                                     $totalRegistros = mysqli_num_rows($query);
                                    
                                    
                                    ?>
                                     <nav class="navbar navbar-light bg-light">
                                      <a class="navbar-brand">
                                          Serviços
                                          <span class="badge badge-primary badge-pill"><?php echo $totalRegistros;?></span>
                                      </a>
                                          <a href="agenda.php"class="nav-link border rounded border-primary pr-1 pl-1 pb-1 pt-1">Voltar</a>
                                      <form class="form-inline " method="GET" action="agenda_pesquisa.php">
                                          <input class="form-control mr-sm-2" name="pesquisar" type="search" value="<?php echo $valor_pesquisar;?>" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                      </form>
                                    </nav>    
                                <?php while($line = mysqli_fetch_array($query)){ ?>   
                                        <div class="row justify-content-center">
                                            <div class="  col-md-12 col-sm-12 pb-4">
                                                <?php
                                                echo"<div class='border rounded p-2 shadow-sm'>
                                                        <div>
                                                            <p class='m-0'><strong>Nome:  </strong>".$line['nome']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Email: </strong>" .$line['email']."</p>
                                                        </div>
                                                        <div>
                                                            <p class='m-0'><strong>Serviço:  </strong>".$line['nome_serv']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Data: </strong>" .$line['data']."</p>
                                                        </div>  
                                                        <div> 
                                                            <p class='m-0'><strong>Hora: </strong>" .$line['hora']."</p>
                                                        </div>
                                                        <div>  
                                                            <p class='m-0'><strong>Observações: </strong>" .$line['observacoes']."</p>
                                                        </div>
                                                        <div>  
                                                            <h4 class='m-0 text-success'><strong class='text-dark'>Status: </strong>" .$line['situacao_atual']."</h4>
                                                        </div>
                                                        
                                                        <div>
                                                           <a class=' float-right mr-2 mt-2' href='deletar_servico.php? idagenda=" . $line['idagenda'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></i></a>                                                   
                                                       </div>
                                                    </div>
                                                    ";
                                                ?>
                                            </div> 
                                        </div>
                                <?php } ?>
                          </div>
                      
                        </div>
                      </div>
                    </div>
                    
                     
            </div>
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
