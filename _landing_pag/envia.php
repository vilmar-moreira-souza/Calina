<?php    
  $email =  $_POST["email"];
  $mensagem = $_POST["mensagem"]; 
if(($_POST['email'] != "") and ($_POST['mensagem'] != "")){   // se formulario preenchido -nao vazio
  require_once ("mailer/PHPMailerAutoload.php");
  require_once ("mailer/class.phpmailer.php");
  require_once ("mailer/class.smtp.php");
  //habilitar smtp
   $mail = new PHPMailer;    
   $mail->Port = 587;
   $mail->SMTPSecure = 'tls';    
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'contato2bsantos@gmail.com';
   $mail->Password = 'vilmar97324674';
   //remetente
   $mail->From =('contato2bsantos@gmail.com');
   $mail->fromname =("vilmar");
   //destinatario
   $mail->addAddress("$email","vilmar");     
   $mail->isHTML(true);     
   $mail->Subject = ("teste");// assunto
   $mail->Body = ("$mensagem"); // corpo da mensagem
   $enviado = $mail->send();    
    if($enviado) {
      //echo("enviado")    ; 
      require("enviado.html");     
     }  
       else {                                              
        //echo 'Erro: ' . $mail->ErrorInfo;  //mostra erro
        require("erro_envio.html");
        }
 }
   else { // formulario  vazio
    require("erro_form.html");
   }   
?>
