<?php
	require dirname(__FILE__).'/mail/PHPMailerAutoload.php';
	$mail_post = $_POST['mail'];
    $obj_post = $_POST['obj'];
    $text_post = $_POST['text'];

	$mail = new PHPMailer();

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'unisagj@gmail.com';                   // SMTP username
        $mail->Password = 'sc13nt1f1c4m3nt3';               // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
        $mail->setFrom($mail_post);     //Set who the message is to be sent from
        $mail->addReplyTo($mail_post);  //Set an alternative reply-to address
        $mail->addAddress('unisagj@gmail.com');  // Add a recipient
        $mail->WordWrap = 1000;

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Mail Da UNISAGJ: '.$obj_post.'';
        $mail->Body    = 'Mail Inviata Da:'.$mail_post.'<br /><br />Messaggio:<br />'.$text_post.'<br />';
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
	
?>
