
<?php
include_once 'connect.php';
   if(!isset($_SESSION))  
    { 
        session_start();
        
    }
    if (isset($_SESSION["nivel"])){
        
        $nivel = $_SESSION["nivel"];
        $nome = $_SESSION["nome"];
        
    }else {
        $nivel = "";
    }
 
if($nivel == 1){  //Se o nível for igual a 1, então entrar como adiministrador
    ?> 
       <!-- Navbar -->
	<div class="navbar botao_acesso justify-content-end">
          <i class="fas fa-user-circle" style="font-size:40px;color:#30c3cf;"></i>
          <a class="pl-0 ml-1 user text-white disabled"> <span style="color: #30c3cf;font-weight:bold">Olá, </span><?php echo "$nome"; ?></a>
          <a href="adm.php">Agenda <i class="far fa-calendar"style="color:#5da5ef;"></i></a>
          <a href="logout.php"> Sair <i class="fas fa-sign-out-alt "style="color:#fff90d;"></i></a>            
        </div>
    <?php
     
}else if ($nivel =="" ) { //Se o nível for igual a vazio, então apenas navegar pelo site
    ?> 
       <!-- Navbar -->
	<div class="navbar botao_acesso justify-content-end">
            <a href="login.php"> Login <i class="fas fa-unlock-alt" style="color: #42a9ca;"></i></a>
          <a href="cadastro.php"> Cadastro <i class="fas  fa-user-plus" style="color: #01fd39;"></i></a>            
        </div>
    <?php 
       
} else { // Se não, logar como cliente
    ?> 
       <!-- Navbar -->
	<div class="navbar botao_acesso justify-content-end">
          <i class="fas fa-user-circle" style="font-size:40px;color:#30c3cf;"></i>
          <a class="pl-0 ml-1 user text-white disabled"> <span style="color:#30c3cf;font-weight:bold">Olá, </span><?php echo "$nome"; ?></a>
          <a href="usuario.php">Minha conta <i class="fas fa-user-edit"style="color:#54de00;"></i></a>
          <a href="logout.php"> Sair <i class="fas fa-sign-out-alt"style="color:#fff90d;"></i></a>            
        </div>
    <?php
      
}

?>



<nav class="navbar navbar-expand-md navbar-light bg-light shadow p-3 mb-5 bg-white rounded " >
    <a class="navbar-brand " href="index.php"><img src="img/logo_pool.png" alt="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="m-auto navbar-nav font-weight-bold" style="font-size: 20px;">
        <li class="nav-item ">
            <a class="nav-link mr-5  p-1 " href="index.php">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link mr-5 p-1 " href="quemsomos.php">Sobre</a>
      </li>
      <li class="nav-item">
          <a class="nav-link mr-5 p-1 " href="servicos.php">Serviços</a>
      </li>
      <li class="nav-item">
          <a class="nav-link  p-1 " href="contato.php">Contato</a>        
      </li>
     
    </ul>

  </div>
</nav>