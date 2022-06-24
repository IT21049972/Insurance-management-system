<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$salt="908g8sug9sgs";
$pass=$_POST["password"].$salt;
$pass=sha1($pass);
$username=$_POST["username"];
$password = $pass; //$_POST["password"];


	
	$sql = "SELECT * from client WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
	
         if ($num>0){
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			header("location: clientDashboard.php");        
		}
		else{
			echo //$password;//"passwords do not match";
			'<script>
			alert("Invalid credentials");
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="styles/styling.css">
    <style>
    body {
        width: 100%;
        background-image: url("images/health.jpeg");
        background-position: center;
        background-size: cover;
        height: 100vh;
		
     }

     .form
     {
        width: 300px;
        background:linear-gradient(to top, rgba(50, 80, 138, 0.728)50%,rgba(129, 226, 255, 0.068));
        border-style: ridge;
        border-color: rgba(0, 0, 0, 0.2);
     }

     .form h2
     {
        width: 250px;
        text-align: center;
        color: black;
        font-size: 30px;
        padding-left:17px;
     }

     #cpass 
     {
        font-family: Arial, Helvetica, sans-serif;
     }

     input.cbox
     {
         width:15px;
         height:15px ;
     }

     input.btnn
     {
        background: rgb(186, 211, 247);
        color:black;
        width: 300px;
        font-size: 21px;
        margin-top: 40px;
        border: groove;
     }

     input.btnn:hover
     {
        color: black;
        background: rgb(172, 171, 171);
     }

     .logo
     {
         position: fixed;
         width:200px;
         height: 140px;
        
         
     }

    </style>
	<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"16b382f6d1d9eea4373d2015fb14bf88c","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script> 
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                
                <img src="images/bg.png" alt="" class="logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="Plans.php">POLICIES</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type to text">
                <a href="#"><button class="btn">search</button></a>
            </div>

        </div>
        <div class="content">
            <h1>Get The Best<br><span>Insurance Plans</span><br>That's Right for You</h1>
            <p class="par">Select within a range of best Insurance Policies in the Market <br> Quick,easy and hassle free
                 <br> Exclusive offer for new customers only</p>

            <button class="cn"><a href="registration.php">Join Us</a></button>

            <div class="form">
			<form method="POST" action="home.php">
                <h2> Login to your account </h2>
                    <input type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" placeholder="Enter your username" required>
				
                    <input type="password" name="password" id = "Show" placeholder="Enter Password Here">
                    <br>
                    <label for="spass">Show password</label>
                        <input type="checkbox" class="cbox" onclick= "showPassword()" >

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

                  <input class="btnn" id = "login" type="submit" value = "Login">
              
				<!--<button class="btnn"><a href="#">Login</a></button>-->
            </div>
        </div>
    </div>
</body>
</html>