<!DOCTYPE html>

<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 10px 13px;
    margin: 3px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
}


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Payment</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
	   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php include 'header.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Payment Information  
						<button class="btn" align="center"> 
						<a href="addPayment.php" class="btn">Add Payment</a>
						</button>
						</h1>
                    </div>
                </div>
                
                <!-- /. ROW  -->
	
<?php 
	
include'connection.php';
	
	
	$id = "";
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$payment_id = $_GET["payment_id"];
	}
		
	
	$sql = "SELECT payment_id, clientid, month, amount, due, fine, agent_id from payment where payment_id='$payment_id'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updatePayment.php" method="post">';
	
	while($row = $result->fetch_assoc()) {
		echo "<label for=\"fname\">RECIPT NO</label>";
	    echo "<input type=\"text\" payment_id=\"fname\" name=\"payment_id\" placeholder=\"Your recpit no..\" value=\"$row[payment_id]\">";
		echo "<label for=\"fname\">CLIENT ID</label>";
	    echo "<input type=\"text\" payment_id=\"fname\" name=\"clientid\" placeholder=\"Client Id..\" value=\"$row[clientid]\">";
		echo "<label for=\"fname\">MONTH</label>";
		echo "<input type=\"text\" payment_id=\"fname\" name=\"month\" placeholder=\"Month..\" value=\"$row[month]\">";
		echo "<label for=\"fname\">AMOUNT</label>";
		echo "<input type=\"text\" payment_id=\"fname\" name=\"amount\" placeholder=\"Amount..\" value=\"$row[amount]\">";
		echo "<label for=\"fname\">DUE</label>";
		echo "<input type=\"text\" payment_id=\"fname\" name=\"due\" placeholder=\"Your Due..\" value=\"$row[due]\">";
		echo "<label for=\"fname\">FINE</label>";
		echo "<input type=\"text\" payment_id=\"fname\" name=\"fine\" placeholder=\"Fine..\" value=\"$row[fine]\">";
		echo "<label for=\"fname\">AGENT ID</label>";
		echo "<input type=\"text\" payment_id=\"fname\" name=\"agent_id\" placeholder=\"Agent Id..\" value=\"$row[agent_id]\">";
		
    }
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
	echo "</form>\n";
	echo "<a href='deletePayment.php?payment_id=".$payment_id."'>Delete Payment</a>";
	
	
	
echo "</div>\n";
echo "\n";

	
?>


            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   

	
</body>
</html>
