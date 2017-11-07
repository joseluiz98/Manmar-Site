<?php
	ini_set("include_path", '/home/belmoney/php:' . ini_get("include_path") );
	require_once('Mail.php');
	require_once('Mail/mime.php');
	$json = file_get_contents('php://input');
	$data = json_decode($json,true);
	echo 'oioioi';
	//echo json_encode(array('flag'=>'hybbdhdb'));

	if(isset($_POST)){
		//'dest'=>'admin@btmt.eu,douglasmb11@hotmail.com',
		$array = array('dest'=>'douglasmb11@hotmail.com',
						'titulo'=>'Call receive by BTMT.EU',
						'email'=>$_POST['YourEmail'],
						'name'=>$_POST['YourName'],
						'subject'=>$_POST['Subject'],
						'phone'=>$_POST['PhoneNumber'],
						'msn'=>$_POST['YourMessage']);

		sendEmail($array);
		//header("Location:/");
		echo json_encode(array('flag'=>$array));	

	}

	$array = array('dest'=>'douglasmb11@hotmail.com',
						'titulo'=>'Call receive by BTMT.EU',
						'email'=>'teste',
						'name'=>'teste',
						'subject'=>'teste',
						'phone'=>'teste',
						'msn'=>'teste');

	sendEmail($array);

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
	    
	    /*$smtp = Mail::factory('smtp', array(
	        'host' => 'ssl://smtp.gmail.com',
	        'port' => '465',
	        'auth' => true,
	        'username' => 'kingbraz@belmoney.be',
	        'password' => 'FW9<aB4p'
	    ));*/

		/*$smtp = Mail::factory('smtp', array(
	        'host' => 'ssl://localhost',
	        'port' => '465',
	        'username' => 'noreply@backoffice.belserv.org',
	        'password' => 'Belmoney1010x'
	    ));*/

		$smtp = Mail::factory('smtp', array(
	        'host' => 'ssl://localhost',
	        'port' => '465',
	        'username' => 'enquiry@belserv.org',
	        'password' => 'Belmoney1010x'
	    ));
	    
	    $mime_params = array('head_encoding' => 'base64',  
          'text_encoding' => '8bit',
		  'text_charset'  => 'UTF-8',
		  'html_charset'  => 'UTF-8',
		  'head_charset'  => 'UTF-8'
		);

		$mail = $smtp->send($to, $body->headers($headers), $body->get($mime_params));

		if (PEAR::isError($mail)) {
		    echo('<p>' . $mail->getMessage() . '</p>');
		    return false;
		} else {
			return true;
		}
	}