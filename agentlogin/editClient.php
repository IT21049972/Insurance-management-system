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
    <title>Edit Client</title>

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
                        <h1 class="page-head-line">Clients Information  
						<button class="btn" align="center"> 
						<a href="addclient.php" class="btn">Add Client</a>
						</button>
						</h1>
                    </div>
                </div>
                
                <!-- /. ROW  -->
<?php 

	
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$clientid = $_GET["clientid"];	
	}
	
	//                       checking if agent is authorized to edit or not  
	$temp_id="";
	$master_id="admin";
	$sql = "SELECT agent_id from client where clientid='$clientid'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$temp_id= $row['agent_id'];
	}
	
	if($_SESSION["username"]==($temp_id || $master_id)){
		
	
	$sql = "SELECT * from client where clientid='$clientid'";
	$result = $conn->query($sql);
	
	  echo "<div>\n";
	 

	while($row = $result->fetch_assoc()) {
		$images = $row["image"];
		
?>
<img class="profile-user-img img-responsive"  width="200px" height="200px" src="<?php echo "../project/uploads/".$images ?>" alt="User profile picture">

<form action="updateClient.php" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload"><br>

<?php



		
		echo "<label for=\"fname\">CLIENT ID</label>";
	    echo "<input type=\"text\" clientid=\"fname\" name=\"clientid\" placeholder=\"clients id..\" value=\"$row[clientid]\">";
		echo "<label for=\"fname\">USERNAME</label>";
	    echo "<input type=\"text\" clientid=\"fname\" name=\"uname\" placeholder=\"clients id..\" value=\"$row[username]\">";
		echo "<label for=\"fname\">CLIENT PASSWORD</label>";
	    echo "<input type=\"text\" clientid=\"fname\" name=\"password\" placeholder=\"clients password..\" value=\"$row[password]\">";
		echo "<label for=\"fname\">NAME</label>";
	    echo "<input type=\"text\" clientid=\"fname\" name=\"fname\" placeholder=\"clients name..\" value=\"$row[fname]\">";
		echo "<label for=\"fname\">GENDER</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"gender\" placeholder=\"clients gender..\" value=\"$row[gender]\">";
		echo "<label for=\"fname\">DATE OF BIRTH</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"dob\" placeholder=\"clients Birth Date..\" value=\"$row[dob]\">";
		echo "<label for=\"fname\">E-MAIL ADDRESS</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"email\" placeholder=\"clients Email..\" value=\"$row[email]\">";
		echo "<label for=\"fname\">PHONE</label>";
		echo "<input type=\"text\" client_id=\"fname\" name=\"phone\" placeholder=\"clients Phone..\" value=\"$row[contacno]\">";
		echo "<label for=\"fname\">ADDRESS</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"address\" placeholder=\"clients Address..\" value=\"$row[address]\">";
		echo "<label for=\"fname\">POLICY ID</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"policy\" placeholder=\"policy id..\" value=\"$row[policy]\">";
		echo "<label for=\"fname\">AGENT ID</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"agent_id\" placeholder=\"agent id..\" value=\"$row[agent_id]\">";
		
		

		
		
		?>
			<input type="submit" value="UPDATE" name="submit">
			</form>
		<?php
	echo "<a href='deleteClient.php?clientid=".$clientid."'>Delete Client</a>";
	

echo "</div>\n";
echo "\n";
    }
	}else{ echo "you are not authorized to edit this client";
	}
	
	
	
?>
            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


	
</body>
</html>
