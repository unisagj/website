<?php

	include '../conf/db_data.inc.php';
	require dirname(__FILE__).'/mail/PHPMailerAutoload.php';

	$mail_post = $_POST['mail'];
	$user_post = $_POST['user'];
	$pwd_post = md5($_POST['pwd']);

	$activation = time();

	$sql = "INSERT INTO jammers (ID_J, USERNAME, MAIL, PWD, ACTIVATION, TEAM_LEADER, STATUS, ID_T) VALUES (NULL, '".$user_post."',  '".$mail_post."',  '".$pwd_post."', '".$activation."', 0, 0, 0)";
	
	mysql_query($sql) or die("error");

	$mail = new PHPMailer();

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'unisagj@gmail.com';                   // SMTP username
	$mail->Password = 'sc13nt1f1c4m3nt3';               // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
	$mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
	$mail->setFrom('unisagj@gmail.com', 'UNISAGJ');     //Set who the message is to be sent from
	$mail->addReplyTo('unisagj@gmail.com', 'UNISAGJ');  //Set an alternative reply-to address
	$mail->addAddress($mail_post);  // Add a recipient
	$mail->WordWrap = 1000;

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Regitrazione UNISAGJ';
	$mail->Body    = '<h1>UNISAGJ</h1><br />Ciao '.$user_post.', <br/> Questa mail ti viene inviata dal sito di UNISAGJ per verificare la tua registrazione.<br/>Si prega di verificare la vostra email. <br/> <br/> <a href="'.$base_url.'php/activation.php?code='.$activation.'">'.$base_url.'php/activation.php?code='.$activation.'</a><br/>';
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	 
	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}
	 
	echo 'ok';

	/*$headers = "From: noreply@unisagj.it\r\n";
	$headers .= "Reply-To: unisagj@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= '<h1>UNISAGJ</h1>';
	$message .= 'Ciao '.$user.', <br/> Questa mail ti viene inviata dal sito di UNISAGJ per verificare la tua registrazione.<br/>';
	$message .= 'Si prega di verificare la vostra email. <br/> <br/> <a href="'.$base_url.'php/activation.php?code='.$activation.'">'.$base_url.'php/activation.php?code='.$activation.'</a><br/>';
	$message .= '</body></html>';


	mail($mail, 'Registrazione a UNISAGJ', $message, $header, '-F unisagj.it -r noreply@unisagj.it -f noreply@unisagj.it') or die('mailerror');
	//mail($mail, 'Registrazione a UNISAGJ', $message, null, '-F UNISAGJ.IT') or die("mailerror");

	die("ok");*/
			
?>
