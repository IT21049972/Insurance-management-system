
<?php

include 'dbconnect.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <link rel="stylesheet" href="styles/payment.css">
    <style>
        body {
            width: 100%;
            background-image: url("images/background.png");
            background-position: center;
            background-size: cover;
            height: 100vh;
         }

         #confirm
         {
             font-size:30px;
             margin-bottom:20px;
             margin-top:-0px;
         }

         .container
         {
             width:900px;
             height:450px;
         }

         .container a
         {
             margin-top:-25px;
         }

         input[type=submit]
        {
            margin-top:20px;
            background-color:lightgrey;
            width:100px;
            height:30px;
            font-size:19px;
            border-radius:8px;
            border:solid;
            cursor:pointer;
        }
        

    </style>
</head>
<body>
    <div class="container">
	<a href="clientDashboard.php">back</a>
	   <form action="normalpamentprocess.php" method="POST">
		<?php
		/*	$currentuser=$_SESSION['username'];
			$sql= "SELECT* FROM client where username='$currentuser'";



			$res=mysqli_query($conn,$sql);
		
			if($res){
				if(mysqli_num_rows($res)>0){
					while($row = mysqli_fetch_array($res)){
						//print_r($row['username']);			
						$ID=$row['clientid'];
						$_SESSION['ID']= $ID;
					}
				}
			}*/
		?>
        <h1 id="confirm">Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Client ID</h3>
                <div class="input-field">
                    <input  type="text"  name="id" value="">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" maxlength="3" pattern="[0-9]{3}">
                </div>
            </div>
			<div >
                <h3>Ammount</h3>
                <div class="input-field">
                    <input type="text" name="value" maxlength="10">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field" >
                    <input type="text" maxlength="16">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiration Date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                    <select name="years" id="years">
                        <option value="2020">2020</option>
                        <option value="2019">2021</option>
                        <option value="2018">2022</option>
                        <option value="2017">2023</option>
                        <option value="2016">2024</option>
                        <option value="2016">2025</option>
                        <option value="2016">2026</option>
                        <option value="2016">2027</option>
                        <option value="2016">2028</option>
                    </select>
                </div>
                <div class="cards">
				 <input type="checkbox" name="type" value="visa">
                    <img src="images/visa.png" alt="visa">
					 <input type="checkbox" name="type" value="Mastercard">
                    <img src="images/mastercard.png" alt="mastercard">
					 <input type="checkbox" name="type" value="Paypal">
                    <img src="images/paypal.png" alt="paypal">
                </div>
            </div>
        </div>
        <input type="submit" value="confirm">
		</form>
    </div>
</body>
</html>