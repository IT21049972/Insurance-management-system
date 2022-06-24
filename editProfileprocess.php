<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$id=$_POST["id"];
$firstname=$_POST["fname"];
//$lastname=$_POST["lastname"];
$username=$_POST["username"];
$salt="908g8sug9sgs";
$pass=$_POST["password"].$salt;
$pass=sha1($pass);
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

//$cpassword = $_POST["cpassword"];//$cpassword = $_POST["cpassword"];
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
   /* $existSql = "SELECT * FROM client WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
		echo '<script>
		alert("username has already been used");
		</script>';  
    }
    else{*/

		if(($password == $cpassword) && $exists==false){ // && preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)){
			//$CID= $_SESSION['ID'];
			$sql = "UPDATE client SET fname='$firstname',username='$username',password='$pass',address='$address',email='$email',gender='$gender',dob='$dob',contacno='$number',policy='$policy' WHERE clientid='$id'";
		$result = mysqli_query($conn, $sql);
         if ($result){
			echo //"updated";
				'<script>
					alert("Profile Updated login again to see saved changes");
					window.location.href="home.php";
					</script>';        
					}else{
						echo '<script>
						alert("email has already been used");
						</script>'; 
					}
	 }else{
		echo //"passwords do not match";
		'<script>
		alert("Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character or passwords do no match");
		window.location.href="editMyprofile.php";
		</script>';
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