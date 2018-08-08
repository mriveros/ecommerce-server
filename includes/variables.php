<?php
	//database configuration
	$host ="127.0.0.1";
	$user ="root";
	$pass ="Riveros200587!";
	$database = "ecommerce";
	$connect = new mysqli($host, $user, $pass,$database) or die("Error : ".mysql_error());
	
	//access key to access API
	$access_key = "12345";
	
	//google play url
	$gplay_url = "https://play.google.com/store/apps/details?id=your.package.com";
	
	// email configuration


	$admin_email = "ecommerce23py@gmail.com";
	$email_subject = "Notification of changes to account information!";
	$change_message = "You have change your admin info such as email and or password.";
	$reset_message = "Tu nuevo password es  ";
	
	//order notification configuration
	$reservation_subject = "New Order Notification!";
	$reservation_message = "Hay una nueva orden , por favor revise el Panel Admin.";
	$message_customer = "Felicidades!,\n\nHemos recibido tu pedido, en breve preparamos y te lo enviamos a tu dirección.";
	//copyright
	$copyright = "";
?>
