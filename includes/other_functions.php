<?php

	function send_mail($email){
		

		require_once "Mail.php";

		$from = "ecommerce23py@gmail.com";
		$to = $email;
		$subject = "Hi!";
		$body = "Hi,\n\nHow are you?";

		$host = "smtp.gmail.com";
		$username = "ecommerce23py@gmail.com";
		$password = "Riveros200587!";

		$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		array ('host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password));

		$mail = $smtp->send($to, $headers, $body);

		if (PEAR::isError($mail)) {
		 echo("OK");
		 } else {
		 echo("Failed");
 }

 
		}


?>