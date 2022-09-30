<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo.css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="baguettBox/baguetteBox.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="icones_menu.css" rel="stylesheet" type="text/css"/>
    </head>
  
   
   
    <body class="background-info">
       <?php include_once 'cabecalho.php'?>
       
        
     <div class="container">
     
 
 

  
      
    <div class="tz-gallery ">
    <?php
    if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    }
    ?>    
     <h1 class="text-center">Manutenção de piscinas</h1>
     <p class="page-description text-center">Serviços de alta qualidade</p>
   
        <div class="row mb-3">
            <div class="col-md-4 ">
                <div class="card border-0">
                    <a class="lightbox" href="img/galeria_piscina_1.jpeg">
                        <img src="img/galeria_piscina_1.jpeg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4 ">
                <div class="card border-0">
                    <a class="lightbox" href="img/galeria_piscina.jpeg">
                        <img src="img/galeria_piscina.jpeg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4 ">
                <div class="card border-0">
                    <a class="lightbox" href="img/piscina2.jpg">
                    <img src="img/piscina2.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
        </div>
          <div class="row"> 
            <div class="col-md-4">
                <div class="card border-0">
                    <a class="lightbox" href="img/galeria_piscina_2.jpeg">
                        <img src="img/galeria_piscina_2.jpeg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4 ">
                <div class="card border-0">
                    <a class="lightbox" href="img/pi.jpg">
                    <img src="img/pi.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4">
                <div class="card border-0">
                    <a class="lightbox" href="img/piscina2.jpg">
                        <img src="img/piscina2.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
         
        </div>
  
    </div>
  

         

              <div class="row justify-content-center mt-5">
                  <a href="agendar.php" type="submit" class="btn" style="color:white">Agendar Serviço</a>
                 
              </div>
          
    </div>
        
   <?php include_once 'footer.php'?>   
        
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="baguettBox/baguetteBox.min.js" type="text/javascript"></script>
        
        <script>
        baguetteBox.run('.tz-gallery');
        </script>
         
    </body>
</html>
