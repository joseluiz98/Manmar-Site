<?php 
require_once("../../../wp-load.php");

if(!empty($_POST)):

    $number = strip_tags($_POST['txtNumberFile']);
    $nameFile = strip_tags($_POST['txtNameFile']);
    $urlFile = strip_tags($_POST['txtUrlFile']);
    $created = date('Y-m-d H:i:s');


    global $wpdb;
    $wpdb->get_results("SELECT number_whatsapp FROM rdp_contact_whatsapp WHERE number_whatsapp LIKE '%" .$number."%'");

        if($wpdb->num_rows > 0):


            require 'PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer();
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'gm.sendmail@gmail.com';            // SMTP username
            $mail->Password = 'gm@sendmail';                      // SMTP password
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Charset = 'UTF-8';                             //codificação UTF-8

            $mail->From = 'rodrigo@campanha15.com.br';
            $mail->FromName = 'Pedido de Material - Rodrigo Pacheco';
            $mail->addAddress('giuliano@campanha15.com.br'); // Name is optional


            $body ='Numero: ' . $number . '<br />
            Nome do Arquivo: ' . $nameFile . '<br />
            Caminho do Arquivo: ' . $urlFile . '<br />';

            $mail->AddReplyTo("$email","$name");
            $assunto = 'Pedido de Material - Rodrigo Pacheco';

            //Define a mensagem (Texto e Assunto)
            $mail->Subject = $assunto;
            $mail->Body = utf8_decode($body);

            if (!$mail->Send()) {
                ?>
                <script language="javascript" type="text/javascript" charset="UTF-8">
                alert('Erro ao enviar solicitação.');
                window.location = 'http://rodrigo15.com.br/apoie/';
                </script>
                <?php
            } else {
                ?>
                <script language="javascript" type="text/javascript" charset="UTF-8">
                alert('Seu número já está cadastrado. O Envio será realizado em breve!');
                window.location = 'http://rodrigo15.com.br/apoie/';
                </script>
                <?php
            }

            ?>
            <?php
        else:


            global $wpdb;
            $wpdb->insert('rdp_contact_whatsapp',array('number_whatsapp'=>$number,'nameFile'=>$nameFile,'urlFile'=>$urlFile,'created'=>$created),array('%s','%s','%s','%s'));

            require 'PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer();
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'gm.sendmail@gmail.com';            // SMTP username
            $mail->Password = 'gm@sendmail';                      // SMTP password
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Charset = 'UTF-8';                             //codificação UTF-8

            $mail->From = 'rodrigo@campanha15.com.br';
            $mail->FromName = 'Pedido de Material - Rodrigo Pacheco';
            $mail->addAddress('giuliano@campanha15.com.br'); // Name is optional

            $body ='Numero: ' . $number . '<br />
            Nome do Arquivo: ' . $nameFile . '<br />
            Caminho do Arquivo: ' . $urlFile . '<br />';

            $mail->AddReplyTo("$email","$name");
            $assunto = 'Pedido de Material - Rodrigo Pacheco';

            //Define a mensagem (Texto e Assunto)
            $mail->Subject = $assunto;
            $mail->Body = utf8_decode($body);

            if (!$mail->Send()) {
                ?>
                <script language="javascript" type="text/javascript" charset="UTF-8">
                alert('Erro ao enviar solicitação.');
                window.location = 'http://rodrigo15.com.br/apoie/';
                </script>
                <?php
            } else {
                ?>
                <script language="javascript" type="text/javascript" charset="UTF-8">
                alert('O Envio será realizado em breve!');
                window.location = 'http://rodrigo15.com.br/apoie/';
                </script>
                <?php
            }
        endif;

endif;
?>