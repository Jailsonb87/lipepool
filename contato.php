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
       <?php include_once 'cabecalho.php'
         
       
       ?>
        
<div class="container my-5">
          
        <div class="row justify-content-center">
            <div class="rounded col-sm-12 col-md-10 col-lg-6 col-xl-6 p-0 m-4 border shadow-lg bg-white" >
               
                <div  class="p-3" style="overflow: hidden;">
                     <?php if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
                ?>
                    <form action="envia_mensagem.php" method="POST">
                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required="">
                      </div> 
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="">
                      </div>                 
                      <div class="form-group ">
                        <label for="exampleFormControlTextarea1">Mande sua mensagem</label>
                        <textarea class="form-control" id="textarea" name="mensagem" rows="3" required=""></textarea>
                      </div>
                       <div class="form-group">
                          <button type="submit" class="btn float-right">Enviar</button>
                      </div> 
                    </form>
                </div>  
            </div>

            <div class="rounded col-sm-12 col-md-10 col-lg-4 col-xl-4 p-0 m-4 border shadow-lg bg-white">
                <div class=" p-2" style="text-align: center; background-color: transparent;">
                    
                    <h3 class=""> CONTATO</h3>
                            
                            <p> Rio de Janeiro - RJ</p>
                            <h4>Telefone</h4>
                            <p>(21) 973501156</p>
                            <h4 >Email</h4>
                            <p>email@lipepool.com <br>
                                <br>
                                <br>
                                
                            <div class="social">
                                <ul class="justify-content-center">
                                        <li>
                                            <a class="link1"href='https://pt-br.facebook.com/' target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a> 
                                        </li>
                                        <li>
                                            <a class="link2"href="https://www.instagram.com/?hl=pt-br" target="_blank">
                                              <i class="fab fa-instagram"></i>
                                            </a> 
                                        </li>
                                        <li>
                                            <a class="link3"href='https://web.whatsapp.com/%F0%9F%8C%90/pt-br' target="_blank">
                                               <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>

                                   </ul>
                            </div>
                    </div>
                </div>
            </div>
</div>
        
     <?php include_once 'footer.php'?>
        
        <script src=jquery/jquery-3.3.1.min.js></script>
        <script src="popper/popper.min.js" ></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>