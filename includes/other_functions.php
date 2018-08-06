<?php
	//database configuration
	class other_functions{

		function send_mail($email){
		
			require_once "../includes/Mail.php.php";

			$from = '<ecommerce23py@gmail.com>';
			$to = $email;
			$subject = 'Hola!';
			$body = "Felicidades!,\n\nhemos recibido tu pedido, en breve procesaremos tu compra y te lo enviaremos a tu dirección.";

			$headers = array(
			    'From' => $from,
			    'To' => $to,
			    'Subject' => $subject
			);

			$smtp = Mail::factory('smtp', array(
			        'host' => 'ssl://smtp.gmail.com',
			        'port' => '465',
			        'auth' => true,
			        'username' => 'ecommerce23py@gmail.com',
			        'password' => 'Riveros200587!'
			    ));

			$mail = $smtp->send($to, $headers, $body);

			if (PEAR::isError($mail)) {
			    echo('<p>' . $mail->getMessage() . '</p>');
			} else {
			    echo('<p>Mensaje Enviado!</p>');
			}
 
		}


	}
?>
