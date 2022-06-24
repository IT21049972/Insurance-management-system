<?php
include 'dbconnect.php';

$cid=$_POST["id"];
$type = $_POST["type"];
$Date = date('Y-m-d H:i:s');
$prem= $_POST["value"];
		
		$sql = "INSERT INTO premium(client_id,type,value,date) VALUES('$cid','$type','$prem','$Date')";
		$result = mysqli_query($conn, $sql);
         if ($result){
			echo '<script>
					alert("Payment succesful");
					window.location.href="services.php";
					</script>';        
					}
	 else{
		echo //"passwords do not match";
		'<script>
		alert("payment invalid");
		window.location.href="normal payment.php";
		</script>';
	 }
?>