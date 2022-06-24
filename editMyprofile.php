<?php
include 'dbconnect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}
 //echo "welcome ".$_SESSION['username'];

?>

<html>
<head>
 <!-- <link rel="stylesheet" href="styles/reg.css"> -->

<style>
body {
  margin: 0;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 20%;
  background-color: skyblue;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 19px;
  
}

li a.active {
  background-color: grey;
  color: white;
}

li a:hover:not(.active) {
  background-color: #540;
  color: white;
}
form{
	width:500px;
	margin:auto;
	padding:20px;
	background:transparent;
	font-size:17px;
	color:black;


	background-color: rgba(0, 0, 0, 0.3);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	border:ridge;
	box-shadow: 0 0 5px #000;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 500px;
	height: 600px;
}

input[type=text], select, text 
{
  width: 50%;
  padding: 4px;
  border-radius: 4px;
}

input[type=submit]
{
	margin-top:50px;
	margin-left:180px;
	cursor:pointer;
	background-color: grey;
	width:120px;
	height: 35px;
	font-size:16px;
	border-radius: 8px;
	border:solid;
	
}

input[type=submit]:hover
{
	background-color: #92a8d1;
}

</style>
</head>
<body>
	<script src="js/script.js"></script>

<ul>
  <li><a href="clientDashboard.php">Home</a></li>
  <li><a href="payment.php">Pay Premium</a></li>
    <li><a href="paymenthistory.php">Payment History</a></li>

    <li><a class="active "href="#contact">Edit Profile</a></li>

  <li><a href="logout.php" onclick="ConfirmLogout()">Logout</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;background-color:azure;">
  <h2>Edit profile <?php echo $_SESSION['username'];?></h2>
    <div class="container">
    
        <form action="editProfileprocess.php" method="POST">
		<?php
			$currentuser=$_SESSION['username'];
			$sql= "SELECT* FROM client where username='$currentuser'";



			$res=mysqli_query($conn,$sql);
		
			if($res){
				if(mysqli_num_rows($res)>0){
					while($row = mysqli_fetch_array($res)){
					//print_r($row['username']);			
					$ID=$row['clientid'];
			$_SESSION['ID']= $ID;
					?>
					
					<label>Client ID:   </label>
                    <input readonly type="number" name="id" value="<?php echo $row['clientid']; ?>" placeholder="Enter your name" >
					<br>
					<br>
					<div class="user-details">
					<div class="input-box">
                    <span class="details">Full Name:  </span>
                    <input type="text" name="fname" value="<?php echo $row['fname']; ?>" placeholder="Enter your name" required>
					</div>
					<br>
									<div class="input-box">
                    <span class="details">Select Policy:</span>
					<select name="policy" id="plan">
					<option value="UHP1.1">Family Lite</option>
					<option value="UHP1.2">Family Plus</option>
					<option value="UHP1.3">Family Extra</option>
					<option value="UHP2.1">Accidents Lite</option>
					<option value="UHP2.2">Accidents Plus</option>
					<option value="UHP2.3">Accidents Extra</option>
					<option value="UHP3.1">60+ Lite</option>
					<option value="UHP3.2">60+ Plus</option>
					<option value="UHP3.3">60+ Extra</option>
					<option value="UHP4.1">Critical Lite</option>
					<option value="UHP4.2">Critical Plus</option>
					<option value="UHP4.3">Critical Extra</option>	
					<option value="UHP5.1">Wellness Lite</option>
					<option value="UHP5.2">Wellness Plus</option>
					<option value="UHP5.3">Wellness Extra</option>					
					</select>
  <br><br>                
  </div>
					<br>
					<div class="input-box">
                    <span class="details">Username:</span>
                    <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Enter your username" required>
					</div>
					<br>
					<div class="input-box">
                    <span class="details">Address:</span>
                    <input type="text" name="address" value="<?php echo $row['address']; ?>" placeholder="Enter your address" required>
					</div>
					<br>
					<div class="input-box">
                    <span class="details">Date of Birth:</span>
                    <input type="date" value="<?php echo $row['dob'];?>" name="dob" min="1970-01-02" max="2001-12-30" placeholder="Enter your date of birth" required>
					</div>
					<br>
					<div class="input-box">
                    <span class="details">Email:</span>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter your email" required>
					</div>
					<br>
					<div class="input-box">
                    <span class="details">Phone Number:</span>
                    <input type="tel" name="contactno"  maxlength="10" size="10" value="<?php echo $row['contacno']; ?>" max="10" placeholder="Enter your name" required>
					</div>
					<br>
					<div class="input-box">
                    <span class="details"> Change Password:</span>
                    <input type="text" name="password" value="" placeholder="Enter your password" required ><br>
					<span class="details"> confirm Password:</span>
					 <input type="text" name="cpassword" value="" placeholder="Enter your password" required >
					</div>
					<br>
					<div class="input-box">
                   <!-- <span class="details">Confirm Password</span>
                    <input type="text" name="cpassword" placeholder="Confirm your password" required>-->
					</div> 
				</div>
				<br>
				                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Gender:</span>
                    </label>
            		<input readonly type="text" value="<?php echo $row['gender']; ?>" placeholder="" required>
<br>
				<div class="gender-details">

                <input type="radio" name="gender" value="male" id="dot-1">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>&nbsp

                <input type="radio" name="gender" value="female"id="dot-2">
				                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Female</span>
                    </label>
 </div>
 <br>
            <div class="button">
                <input type="submit" value="UPDATE">
            </div>
			<?php
			}
		
			}	
		}
		?>
            
        </form>
</div>

</body>
</html>
