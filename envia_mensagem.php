
<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "jailsob958@gmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "jailsonb87@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Jailson, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        $_SESSION['msg'] ="<div class='alert alert-success ' role='alert'>"
                     . "Mensagem enviada com sucesso!"
                         . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             . "<span aria-hidden='true'>&times;</span>"
                         . "</button>"
                     . "</div>";
        header("location:contato.php");
        ?>
    </body>
</html>
