<?php
require 'PHPMailer/PHPMailerAutoload.php';
try {

    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPSecure = 'tls';                            // tls, `ssl` also accepted
    $mail->Host = 'smtp.gmail.com';                       // smtp.gmail.com
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'gm.sendmail@gmail.com';            // SMTP username
    $mail->Password = 'gm@sendmail';                      // SMTP password
    $mail->Port = 587;                                    // 587
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Charset = 'UTF-8';                             // Codification UTF-8


    $mail->From = 'gm.sendmail@gmail.com';
    $mail->FromName = 'Rodrigo Pachceco';

    $destino = strip_tags($_POST['destinatario']);


    switch ($destino) {
        case 'Geral':
            $mail->addAddress('contato@rodrigo15.com.br');
            break;
        case 'Imprensa':
            $mail->addAddress('giuliano@campanha15.com.br');
            break;
        case 'Material de Campanha':
            $mail->addAddress('giuliano@santiagomartins.com.br');
            break;
        case 'Trabalhe Conosco':
            $mail->addAddress('giuliano.martins@orodigital.com.br');
            break;
    }

    //$mail->addAddress('giuliano@campanha15.com.br');

    $message = file_get_contents('mail-templates/contato.html'); 
    $message = str_replace('%nome%', $_POST['nome'], $message); 
    $message = str_replace('%email%', $_POST['email'], $message);
    $message = str_replace('%destinatario%', $_POST['destinatario'], $message);
    $message = str_replace('%mensagem%', $_POST['msg'], $message);

    $mail->Subject = 'Contato Site';
    $mail->MsgHTML($message);

    $mail->Send();

    echo '<p>Mensagem enviada com sucesso !</p>'; //retorno devolvido para o ajax caso sucesso

} catch (phpmailerException $e) {

    echo $e->errorMessage(); //retorno devolvido para o ajax caso erro
}
?>