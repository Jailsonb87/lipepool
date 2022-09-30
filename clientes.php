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
         <?php
	include_once("connect.php");
	
            //Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
            $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
             
            //Selecionar todos os clientes da tabela
            $sql = "SELECT * FROM cliente where nivel = 0;";
	    $query = mysqli_query($connect, $sql);

            //Contar o total de clientes
            $total_clientes = mysqli_num_rows($query);

            //Seta a quantidade de clientes por pagina
            $quantidade_pg = 10;

            //calcular o número de pagina necessárias para apresentar os clientes
            $num_pagina = ceil($total_clientes/$quantidade_pg);

            //Calcular o inicio da visualizacao
            $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

            //Selecionar os clientes a serem apresentado na página
            $result_clientes = "SELECT * FROM cliente where nivel = 0 limit $incio, $quantidade_pg";
            $resultado_clientes = mysqli_query($connect, $result_clientes);
            $total_clientes = mysqli_num_rows($resultado_clientes);

        
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }
            ?>
           <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand">
                  Clientes
             <span class="badge badge-primary badge-pill"><?php echo $total_clientes;?></span>
              </a>
              <form class="form-inline " method="GET" action="clientes_pesquisa.php">
                <input class="form-control mr-sm-2" name="pesquisar" type="search" placeholder="Nome" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
              </form>
            </nav>
           
                <div class="table-responsive">
                   <table class="table table-sm ">
                       <thead class="text-center" >
                        <tr class="thead-dark ">
                          <th  scope="col">Nome</th>
                          <th  scope="col">E-mail</th>
                          <th scope="col">Opções</th>
                        </tr>
                      </thead>
                      <?php while($row = mysqli_fetch_array($resultado_clientes)){ ?>
                      <tbody class="text-center"> 
                        <tr>
                            <th scope="row"><?php echo $row['nome'];?></th>
                            <th scope="row"><?php echo $row['email'];?></th>
                                <th>
                                    <div class=" acao">
                                        
                                        <ul class="row justify-content-center">
                                       <div>
                                            <li class="justify-content-center ">
                                                <a class="link1"href=''  data-toggle="modal" data-target="#exampleModal<?php echo $row['idcliente']; ?> ">
                                                    <i class="fa fa-eye"></i>
                                                </a> 
                                            </li>
                                        </div>
                                        <div>
                                            <li  class="justify-content-center">
                                                <a>
                                               <?php
                                                echo "<a class='link3' href='delete.php? id=" . $row['idcliente'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class='fa fa-trash'></i></a>";   
                                                ?>      
                                                </a>
                                            </li>
                                        </div> 
                                        </ul>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                      
                       
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row['idcliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel " aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel ">Dados do Usuário</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <label class="font-weight-bold">Nome:</label>
                                    <p class="border-bottom"><?php echo $row['nome']; ?></p>
                                <label class="font-weight-bold">E-mail:</label>
                                    <p class="border-bottom"><?php echo $row['email']; ?></p>
                                <label class="font-weight-bold">Bairro:</label>
                                    <p class="border-bottom"><?php echo $row['bairro']; ?></p>
                                <label class="font-weight-bold">CEP:</label>
                                    <p class="border-bottom"><?php echo $row['cep']; ?></p>
                                <label class="font-weight-bold">Endereço:</label>
                                    <p class="border-bottom"><?php echo $row['endereco']; ?></p>
                                <label class="font-weight-bold">Número:</label>
                                    <p class="border-bottom"><?php echo $row['numero']; ?></p>
                                <label class="font-weight-bold">CPF:</label>
                                    <p class="border-bottom"><?php echo $row['cpf']; ?></p>
                                <label class="font-weight-bold">Telefone:</label>
                                    <p class="border-bottom"><?php echo $row['telefone']; ?></p>
                                <label class="font-weight-bold">Celular:</label>
                                    <p class="border-bottom"><?php echo $row['celular']; ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php } ?>
                   </table>
            </div> 
           
           <?php
                //Verificar a pagina anterior e posterior
                $pagina_anterior = $pagina - 1;
                $pagina_posterior = $pagina + 1;
            ?>
            
           <nav aria-label="Page navigation example">
              <ul class="pagination pagination pagination-sm justify-content-center ">
                <li class="page-item ">
                    <?php
                            if($pagina_anterior != 0){ ?>
                                    <a class="page-link" href="clientes.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                                        Anterior
                                    </a>
                            <?php }else{ ?>
                            <li class="page-item disabled">
                              <a class="page-link" >Anterior</a>
                            </li>     
                    <?php }  ?>
                
                <?php 
                 //Apresentar a paginacao
                 for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                <li class="page-item">
                    <a class="page-link" href="clientes.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                
                <li class="page-item">
                    <?php
                            if($pagina_posterior <= $num_pagina){ ?>
                                    <a class="page-link" href="clientes.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
                                       Próxima
                                    </a>
                            <?php }else{ ?>
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">Próxima</a>
                            </li> 
                    <?php }  ?>
                
              </ul>
            </nav>
                    
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




