<?php
	//ini_set("include_path", '/home/belmoney/php:' . ini_get("include_path") );
	require_once('Mail.php');
	require_once('Mail/mime.php');



	if(isset($_POST)){
		$array = array('dest'=>'admin@btmt.eu',
						'titulo'=>'Call receive by BTMT.EU',
						'email'=>$_POST['YourEmail'],
						'name'=>$_POST['YourName'],
						'subject'=>$_POST['Subject'],
						'phone'=>$_POST['PhoneNumber'],
						'msn'=>$_POST['YourMessage']);

		sendEmail($array);
	}

	function sendEmail($email){
		//var_dump($email);
		$from = 'BTMT';
		$to = $email['dest'];
		$title = $email['titulo'];
		$body = new Mail_mime(array("text_charset" => "utf-8",
		                            "html_charset" => "utf-8",
		                            "eol" => "\n"));

		$msn = '<h2>Informações Pessoais</h2>
				<p>'.$email['name'].'</p>
				<p>'.$email['email'].'</p>
				<p>'.$email['phone'].'</p>
				<h2>Motivo do Email</h2>
				<p>'.$email['subject'].'</p>
				<p>'.$email['msn'].'</p>';


		$body->setHTMLBody($msn);

		$headers = array(
		    'From' => $from,
		    'To' => $to,
		    'Subject' => $email['titulo']
		);

		foreach ($headers as $name => $value){
		    $headers[$name] = $body->encodeHeader($name, $value, "utf-8","quoted-printable");
		}
	    
	    $smtp = Mail::factory('smtp', array(
	        'host' => 'ssl://smtp.gmail.com',
	        'port' => '465',
	        'auth' => true,
	        'username' => 'it.support@btservicesgroup.com',
	        'password' => 'braz0015'
	    ));
	    
	    $mime_params = array('head_encoding' => 'base64',  
          'text_encoding' => '8bit',
		  'text_charset'  => 'UTF-8',
		  'html_charset'  => 'UTF-8',
		  'head_charset'  => 'UTF-8'
		);

		$mail = $smtp->send($to, $body->headers($headers), $body->get($mime_params));
		return true;
		/*if (PEAR::isError($mail)) {
		    echo('<p>' . $mail->getMessage() . '</p>');
		    return false;
		} else {
			return true;
		}*/
	}