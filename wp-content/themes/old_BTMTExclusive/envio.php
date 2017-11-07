<?php
/* 
//recebendo os dados do formulário
 $nome = $_GET['nome'];
 $email = $_GET['email'];
 $telefone = $_GET['phone'];
 $mensagem = $_GET['msn'];
*/
 //recebendo os dados do formulário
 $nome = $_POST['YourName'];
 $email = $_POST['YourEmail'];
 $telefone = $_POST['PhoneNumber'];
 $mensagem = $_POST['YourMessage'];

// Destinatário
//$destino = "sarah.paes@btservicesgroup.com"; // separe com vírgula quando mais de um
$destino = "douglasmb11@hotmail.com"; // separe com vírgula quando mais de um


// assunto que será exibido na caixa de entrada de email
$assunto = "Formulario do Site BT";

// criando os cabeçalhos para a funçao mail
$headers  = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $nome <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

//montando a mensagem

$msg = "<h2 style='font-family:verdana; font-size:16px; color:#999'>";
$msg .="nome:";
$msg .="</h2>";
$msg .="<p style='font-family:verdana; font-size:12px; color:#666'>";
$msg .=$nome;
$msg .="</p>";

$msg .= "<h2 style='font-family:verdana; font-size:16px; color:#999'>";
$msg .="E-mail";
$msg .="</h2>";
$msg .="<p style='font-family:verdana; font-size:12px; color:#666'>";
$msg .=$email;
$msg .="</p>";


$msg .= "<h2 style='font-family:verdana; font-size:16px; color:#999'>";
$msg .="Telefone";
$msg .="</h2>";
$msg .="<p style='font-family:verdana; font-size:12px; color:#666'>";
$msg .=$telefone;
$msg .="</p>";

$msg .= "<h2 style='font-family:verdana; font-size:16px; color:#999'>";
$msg .="Mensagem";
$msg .="</h2>";
$msg .="<p style='font-family:verdana; font-size:12px; color:#666'>";
$msg .=$mensagem;
$msg .="</p>";
// enviando o email
mail($destino, $assunto, $msg, $headers);



     /*
     direciona para página com a mensagem de confirmação de envio
     */
     header("Location: index.php");
     //echo 'deu certo'
     //echo json_encode(array('flag'=>'1'));

?>