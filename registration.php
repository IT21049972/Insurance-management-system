<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$firstname=$_POST["fname"];
//$lastname=$_POST["lastname"];
$username=$_POST["username"];
$salt="908g8sug9sgs";
$pass=$_POST["password"].$salt;
$pass=sha1($pass);
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
/*
if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
 echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
} /*else {
 echo "Your password is strong.";
}*/

$address=$_POST["address"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$number=$_POST["contactno"];
$policy=$_POST["policy"];
$exists=false; 

// Check whether this EMAIL exists
$existSql = "SELECT * FROM client WHERE username = '$username'";
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows > 0){
    // $exists = true;
    echo '<script>
    alert("username has already been used");
    </script>';  
}

    else
    {

		if(($password == $cpassword) && $exists==false && preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)){
		$sql = "INSERT INTO client(fname,username,password,address,email,gender,dob,contacno,policy) VALUES('$firstname','$username','$pass','$address','$email','$gender','$dob','$number','$policy' )";
		$result = mysqli_query($conn, $sql);
         if ($result){
			echo '<script>
					alert("Registeration succesful please Log in now");
					window.location.href="home.php";
					</script>';        
					}else{
						echo '<script>
						alert("email has already been used");
						</script>'; 
					}
	 }
     else
     {
		echo //"passwords do not match";
		'<script>
		alert("Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character or passwords do no match");
		</script>';
	 }
	}

    


		/*if(mysqli_query($conn,$sql)){
			echo '<script>
					alert("Record inserted succedfully");
					window.location.href="login.php";
					</script>';
	
			//header("location:index.php");
			//echo"<script language='javascript'>alert('Record inserted succedfully')</script>";
			//result="added"
		}else{
		//echo"<script language='javascript'>alert('error in insert')</script>";
		echo "Error :" .$sql."<br>".$conn->error;*/
}


		//close connection
		//mysqli_close($conn);
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="styles/reg.css">
    <style>

    body {
        width: 100%;
        background-image: url("images/background.png");
        background-position: center;
        background-size: cover;
        height: 100vh;
    }

    .container
    {
        margin-top:200px;
    }

    .container .title 
    {
        padding-top:10px;
        padding-bottom: 20px;
        text-align:center;
        font-size: 30px;
        font-weight: 700;
        position: relative;
    }

    #chbox
    {
        margin-top:8px;
        width:15px;
        height: 15px;
    }

    #stext
    {
        padding-top:10px;
    }

    #message
    {
        padding-top: 10px;
        color: blue; 
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="title">Registration</div>
        <form action="registration.php" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>" placeholder="Enter your name" required>
                </div>
				<div class="input-box">
                    <span class="details">Select Policy</span>
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
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>" placeholder="Enter your address" required>
                </div>
                <div class="input-box">
                    <span class="details">Date of Birth</span>
                    <input type="date" value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>" name="dob" min="1970-01-02" max="2001-12-30" placeholder="Enter your date of birth" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" placeholder="Enter your email" required>
                </div>

				<div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id = "Show" placeholder="Enter your password" required>
                    <label id="stext">Show password</label>
                    <input type="checkbox" id="chbox" onclick= "showPassword()" >

                    <script type="text/javascript">

                    function showPassword()
                        {
	                        var show = document.getElementById('Show');
	                        if(show.type == 'password')
	                        {
		                        show.type= 'text';
	                        }

	                        else
	                        {
		                        show.type= 'password';
	                        }
                        }
                </script>

                    <div id="message">
                        <h3>Password must contain:</h3>
                        <p id="letter" class="invalid">1. A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">2. A <b>uppercase</b> letter</p>
                        <p id="number" class="invalid">3. A <b>number</b></p>
                        <p id="number" class="invalid">4. A <b>special character</b></p>
                        <p id="length" class="invalid">5. Minimum <b>8 characters</b></p>
                    </div>
                </div>

            
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="tel" name="contactno"  maxlength="10" size="10" pattern="[0-9]{10}" value="<?php echo isset($_POST["contacno"]) ? $_POST["contacno"] : ''; ?>" max="10" placeholder="Enter your name" required>
                </div>


                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="cpassword" placeholder="Confirm your password" required>
                </div> 
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" value="<?php echo isset($_POST["gender"]) ? $_POST["gender"] : ''; ?>" id="dot-1">
                <input type="radio" name="gender" value="<?php echo isset($_POST["gender"]) ? $_POST["gender"] : ''; ?>" id="dot-2">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>