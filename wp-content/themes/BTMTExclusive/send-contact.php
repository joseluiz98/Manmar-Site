<?php
require 'PHPMailer/PHPMailerAutoload.php';
try {

    $lang = $_POST['lang'];

    $mail = new PHPMailer();
    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'gam.sendmail@gmail.com';           // SMTP username
    $mail->Password = 'gam@sendmail';                     // SMTP password
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Charset = 'UTF-8';                             // Codificação UTF-8

    $mail->From = $_POST['email'];
    $mail->FromName = 'BT Money Transfers';

    $mail->addAddress('marketing@btservicesgroup.com');
    $mail->addAddress('sarah.paes@btservicesgroup.com');
    $mail->addAddress('marcio.machado@btservicesgroup.com');
    $mail->addAddress('callcenter@btmt.eu');

    $message = file_get_contents('mail-templates/contato.html'); 
    $message = str_replace('%name%', strip_tags(utf8_decode($_POST['nome'])), $message); 
    $message = str_replace('%email%', strip_tags(utf8_decode($_POST['email'])), $message);
    $message = str_replace('%phone%', strip_tags(utf8_decode($_POST['phone'])), $message);
    $message = str_replace('%subject%', strip_tags(utf8_decode($_POST['subject'])), $message);
    $message = str_replace('%message%', strip_tags(utf8_decode($_POST['msg'])), $message);

    $mail->Subject = 'Contato BT Money Transfers';
    $mail->MsgHTML($message);
    $mail->Send();

    //retorno devolvido para o ajax caso sucesso
    $lang = $_POST['lang'];
    switch ($lang) {
     case 'pt-br':
        echo '<p class="text-success">Mensagem enviada com sucesso !</p>'; 
        break;
     case 'fr':
        echo '<p class="text-success">Message envoyé avec succès !</p>'; 
        break;
     default:
        echo '<p class="text-success">Message sent successfully !</p>'; 
        break;
    }

} catch (phpmailerException $e) {

    echo $e->errorMessage(); //retorno devolvido para o ajax caso erro
}
?>