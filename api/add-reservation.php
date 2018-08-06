<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	include_once('../includes/other_functions.php');
	
	// get data from android app
	$name ="Borrar Columna";
	 // $_POST['name'];
	$alamat = $_POST['alamat'];
	$kota = "Borrar Columna";
	//$_POST['kota'];
	$provinsi = "Borrar Columna";
	//$_POST['provinsi'];
	$name2 = $_POST['name2'];
	$date_n_time = $_POST['date_n_time'];
	$phone = $_POST['phone'];
	$order_list = $_POST['order_list'];
	$comment = $_POST['comment'];
	$email = $_POST['email'];
	$latitude = $_POST['latitude'];
	$logitude = $_POST['longitude'];
	$address = $_POST['address'];
	$cod_client = $_POST['cod_client'];
	
	$sql_query = "set names 'utf8'";
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
		// Execute query
		$stmt->execute();
		// store result 
		$stmt->close();
	}
	
	// insert data into reservation table
	$sql_query = "INSERT INTO tbl_reservation(Name, Alamat, Kota, Provinsi, Number_of_people, Date_n_Time, Phone_number, Order_list, Comment, Email, Latitude, Longitude, Address, cod_client) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
		// Bind your variables to replace the ?s
		$stmt->bind_param('ssssssssssssss', 
					$name,
					$alamat,	
					$kota,	
					$provinsi,	
					$name2, 
					$date_n_time, 
					$phone, 
					$order_list,
					$comment,
					$email,
					$latitude,
					$longitude,
					$address,
					$cod_client
					);
		// Execute query
		$stmt->execute();
		$result = $stmt->affected_rows;
		// store result 
		//$result = $stmt->store_result();
		$stmt->close();
	}
	send_mail($email);
	
	// get admin email from user table
	$sql_query = "SELECT Email 
			FROM tbl_user";
	
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
		// Execute query
		$stmt->execute();
		// store result 
		$stmt->store_result();
		$stmt->bind_result($email);
		$stmt->fetch();
		$stmt->close();
	}
	
	// if new reservation has been successfully added to reservation table 
	// send notification to admin via email
	if($result){
		$to = $email;
		$subject = $reservation_subject;
		$message = $reservation_message;
		$from = $admin_email;
		$headers = "From:" . $from;
		mail($to,$subject,$message,$headers);
		echo "OK";
	}else{
		echo "Failed";
	}

	include_once('../includes/close_database.php');
?>
