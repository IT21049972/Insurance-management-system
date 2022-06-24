<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 8px 12px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
	
}


input[type=submit]:hover {
    background-color: #45a049;
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
.dis {
	pointer-events: none;
	cursor: default;
	color:#595959;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Client's Status</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
$username = $_SESSION["username"];
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Client's Status</h1>
                    
                
                <!-- /. ROW  -->
<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$clientid = $_GET["clientid"];
	}
	            //   PRINTS CLIENT's info
	$sql = "SELECT * from client where clientid='$clientid'";
	$result = $conn->query($sql);
	$policy_id = "";
	$agent_id="";
	   
?>
			
<?php
	while($row = $result->fetch_assoc()) {
		$images = $row["image"];
		echo "<img src='../images/".$row['image']."' ><br>";
?> 
			<!--<img class="profile-user-img img-responsive"  width="200px" height="200px" src="<?php echo "../images/".$images ?>" alt="Client has no profile picture"> -->
<?php
"<img src='images/".$row['image']."' ><br>";
		echo "<label for=\"fname\">CLIENT ID</label>";
	    echo "<input disabled type=\"text\" clientid=\"fname\" name=\"clientid\" placeholder=\"clients id..\" value=\"$row[clientid]\">";
		echo "<label for=\"fname\">CLIENT PASSWORD</label>";
	    echo "<input disabled type=\"text\" clientid=\"fname\" name=\"password\" placeholder=\"client password..\" value=\"$row[password]\">";
		echo "<label for=\"fname\">NAME</label>";
	    echo "<input disabled type=\"text\" clientid=\"fname\" name=\"fname\" placeholder=\"clients Name..\" value=\"$row[fname]\">";
		echo "<label for=\"fname\">GENDER</label>";
		echo "<input disabled type=\"text\" clientid=\"fname\" name=\"gender\" placeholder=\"clients gender..\" value=\"$row[gender]\">";
		echo "<label for=\"fname\">BIRTH DATE</label>";
		echo "<input disabled type=\"text\" clientid=\"fname\" name=\"dob\" placeholder=\"clients Birth Date..\" value=\"$row[dob]\">";
		echo "<label for=\"fname\">E-MAIL ADDRESS</label>";
		echo "<input type=\"text\" clientid=\"fname\" name=\"email\" placeholder=\"clients Email..\" value=\"$row[email]\">";
		echo "<label for=\"fname\">ADDRESS</label>";
		echo "<input disabled type=\"text\" clientid=\"fname\" name=\"address\" placeholder=\"clients Address..\" value=\"$row[address]\">";
		echo "<label for=\"fname\">POLICY ID</label>";
		echo "<input disabled type=\"text\" clientid=\"fname\" name=\"policy\" placeholder=\"policy id..\" value=\"$row[policy]\">";
		$policy_id = $row["policy"];
		$c_id      = $row["clientid"];
		$a_id  = $row["agent_id"];
		$agent_id = $row["agent_id"];
		echo "<a href='editClient.php?clientid=".$c_id."'>Edit Client</a>\n";
    }
		echo "<br>\n";
		
	    echo "<br>\n";
	
	            // PRINTS policy info
	
	$sql = "SELECT policy_code,policy_name,policy_des,policy_value FROM policies where policy_code ='$policy_id'";
	$result = $conn->query($sql);
	
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>POLICY ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "    <th>DESCRIPTION</th>\n";
    echo "    <th>AMOUNT</th>\n";
    echo "  </tr>\n";
	
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>\n";
		echo "    <td>".$row["policy_code"]."</td>\n";
		echo "    <td>".$row["policy_name"]."</td>\n";
		echo "    <td>".$row["policy_des"]."</td>\n";
		echo "    <td>".$row["policy_value"]."</td>\n";
	    echo "  </tr>";
		
	}
	}
	

echo '</div>';
	
	
	echo "<br>\n";
	echo "<br>\n";
	echo '<b>Policy Information</b>';//   PRINTS AGEENTS INFO
	$sql = "SELECT * FROM agent where Agent_ID='$a_id'";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
	echo "    <th>AGENT ID</th>\n";
    echo "    <th>NAME</th>\n";
    echo "    <th>BRANCH</th>\n";
    echo "    <th>PHONE</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["Agent_ID"]."</td>\n";
		echo "    <td>".$row["name"]."</td>\n";
		echo "    <td>".$row["branch"]."</td>\n";
		echo "    <td>".$row["phone"]."</td>\n";
		echo "  </tr>";
	}
	}
	
	echo "</br>\n";
	echo "</br>\n";
	echo '<b>Agent Information</b>';

     //prints payments 
	$sql = "SELECT * FROM premium where client_id='$c_id'";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>PAYMENT ID</th>\n";
    echo "    <th>CLIENT ID</th>\n";
    echo "    <th>TYPE</th>\n";
    echo "    <th>AMOUNT</th>\n";
	echo "    <th>DATE</th>\n";
    echo "  </tr>";
	echo "<br>\n";
	
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["payment_id"]."</td>\n";
		echo "    <td>".$row["client_id"]."</td>\n";
		echo "    <td>".$row["type"]."</td>\n";
		echo "    <td>".$row["value"]."</td>\n";
		echo "    <td>".$row["date"]."</td>\n";
		echo "  </tr>";
	}
	}
	
	echo "</table>\n";

	if($agent_id== $username || "admin" == $username){
			echo "<td>"."<a href='deleteClient.php?clientid=".$clientid. "'>Delete Client</a>"."</td>\n";
		}else {
			echo "<td>"."<a class=\"dis\" href='deleteClient.php?clientid=".$row["client_id"]. "'>Delete Client</a>"."</td>\n";
		}
	

echo "\n";


	
?>

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
