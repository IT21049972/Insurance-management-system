<?php
include 'dbconnect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}
 //echo "welcome ".$_SESSION['username'];

?>
<?php

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);
  $user=$_SESSION['username'];

  	$sql = "UPDATE client SET image='$image' WHERE username='$user'";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
    $user=$_SESSION['username'];

  $result = mysqli_query($conn, "SELECT * FROM client WHERE username='$user'");
?>


<html>
<head>
<style>
body {
  margin: 0;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a 
{
  display: block;
  color: #000;
  padding: 12px 16px;
  text-decoration: none;
  font-size:19px
  
}

li a.active {
  background-color: grey;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
   #img_div{
   	width: 60%;
   	padding: 15px;
   	margin: 15px auto;

   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: center;
   	margin: 5px;
   	width: 140px;
   	height: 140px;
	border-radius:50%;
   }

   #cpp
   {
      font-size:17px;
      color: blue;
   }

  button[type=submit]
  {
    background-color:lightgrey;
    width:100px;
    height:30px;
    font-size:17px;
    border-radius:8px;
    border:solid;
    cursor:pointer;
  }  

  #welcome
  {
    margin-left:10px;
    font-size:30px;
  }



</style>
</head>
<body>
	<script src="js/script.js"></script>

<ul>
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' ><br>";
      	//echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
   <h2 id="welcome">  Welcome <?php echo $_SESSION['username']?></h2>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="payment.php">Pay Premium</a></li>
  <li><a href="paymenthistory.php">Payment History</a></li>
  
    <li><a href="editMyprofile.php">Edit Accout</a></li>

  <li><a href="logout.php" onclick="ConfirmLogout()">Logout</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;background: linear-gradient(to top,rgba(0, 0, 0, 0.2)50%,rgba(0, 0, 0, 0.200)50%),url(health.jpg);
 ">
  <h2>MY POLICIES</h2>
  <?php
    $user=$_SESSION['username'];

		$sql= "SELECT policy from client where username='$user'";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $pol=$row["policy"];
		echo "My Policy ID: " . $pol;

    }
} else {
    echo "0 results";
}
	$sqll="SELECT * FROM policies WHERE Policy_code='$pol'";
		$resultt = $conn->query($sqll);

		if ($resultt->num_rows > 0) {
    // output data of each row
			while($row = $resultt->fetch_assoc()) {
				echo "<br>Policy Name - " . $row["Policy_name"];   
				echo "<br> Policy Value - Rs.".$row["Policy_value"];
			}
		} else {
    echo "0 results";
}
$conn->close();
  
  ?>

  <br><br><br><br>
    <form method="POST" action="clientDashboard.php" enctype="multipart/form-data">
	<p id="cpp">Change profile picture</p>
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
    <br>
  	<div>
  		<button type="submit" name="upload">Upload</button>
  	</div>
	</form>
</div>

</body>
</html>
