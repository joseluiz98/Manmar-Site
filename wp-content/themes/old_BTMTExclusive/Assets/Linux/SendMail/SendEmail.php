<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
	<meta charset="utf-8" />
</head>
<body>
	<?php
		///*
		require '../PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;									// Enable verbose debug output

		$mail->isSMTP();										// Set mailer to use SMTP
		$mail->Host = 'smtp.live.com';							// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;									// Enable SMTP authentication
		$mail->Username = 'support@azoora.com';                 // SMTP username
		$mail->Password = 'jaisiyaram@123';                     // SMTP password
		$mail->SMTPSecure = 'tls';								// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;										// TCP port to connect to

		$mail->setFrom('support@azoora.com', 'Azoora Incorporated');

		$mail->addAddress('hashmoody@outlook.com', 'Hash Moody');	// Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		//$mail->isHTML(true);                                  // Set email format to HTML

		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Subject = $_POST['Subject'];
		$Phone = $_POST['Phone'];
		$Message = $_POST['Message'];

		$mail->Subject = 'BTMT - New Contact from ' . $Name . '.';
		$mail->Body    = '<body style="font-family:Segoe UI; font-size:14px;">Name - ' . $Name . '<br>Email - ' . $Email . '<br>Subject - ' . $Subject . '<br>Phone - ' . $Phone . '<br>Message - ' . $Message . '<br><hr><small>Powered by Azoora Incorporated</small></body>';
		$mail->AltBody = 'Name - ' . $Name . ', Email - ' . $Email . ', Subject - ' . $Subject . ', Phone - ' . $Phone . ', Message - ' . $Message . ' ||| Powered by Azoora Incorporated';

		if(!$mail->send())
		{
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		//*/

		//echo $_POST["NameTextBox"];
	?>
</body>
</html>