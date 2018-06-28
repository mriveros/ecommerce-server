<?php
	include_once('includes/connect_database.php'); 
?>

<div id="content" class="container col-md-12">
	<?php 
		
		if(isset($_POST['btnDelete'])){
			if(isset($_GET['id'])){
				$ID = $_GET['id'];
			}else{
				$ID = "";
			}
		
			// delete data from menu table
			$sql_query = "DELETE FROM clients 
					WHERE id = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $ID);
				// Execute query
				$stmt->execute();
				// store result 
				$delete_category_result = $stmt->store_result();
				$stmt->close();
			}
		
	
		}		
		
		if(isset($_POST['btnNo'])){
			header("location: clients.php");
		}
		
	?>
	<h1>Confirmar Acción</h1>
	<hr />
	<form method="post">
		<p>Estas seguro de borrar éste Cliente?</p>
		<input type="submit" class="btn btn-primary" value="Borrar" name="btnDelete"/>
		<input type="submit" class="btn btn-danger" value="Cancelar" name="btnNo"/>
	</form>
	<div class="separator"> </div>
</div>
			
<?php include_once('includes/close_database.php'); ?>