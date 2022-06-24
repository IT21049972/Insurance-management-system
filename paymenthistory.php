<?php 
include 'dbconnect.php';

session_start();
?>
<html>
<head>
<style>
body 
{
  margin: 0;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  background-color:lightgrey;

}


ul {
  list-style-type: none;
  margin-top: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
  font-size:19px;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #0000FF;
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

   table
   {
     margin:20px;
     width: 95%;
     border-collapse: collapse;
    padding: 8px;
     
   }

   th
   {
    padding: 8px;
    text-align: left;
    border-bottom: 3px solid black;
    font-size:19px;
  }

  tr
  {
    text-align:left;
    border: 2px solid black;
    padding: 15px;
    font-size:17px;
  }

  #welcome
  {
    text-align:center;
    font-size:35px;
  }

  #my
  {
    font-size:30px;
  }


</style>
</head>
<body>
	<script src="js/script.js"></script>

<ul>

   <h2 id="welcome">  Welcome <?php echo $_SESSION['username']?></h2>
  <li><a  href="clientDashboard.php">Home</a></li>
  <li><a href="payment.php">Pay Premium</a></li>
    <li><a class="active" href="#">Payment History</a></li>
    <li><a href="editMyprofile.php">Edit Accout</a></li>

  <li><a href="logout.php" onclick="ConfirmLogout()">Logout</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;background: linear-gradient(to top,rgba(0, 0, 0, 0.2)50%,rgba(0, 0, 0, 0.200)50%),url(health.jpg);
 ">
  <h2 id="my">My Payments</h2>

<div class="productDatatbl" >
 <table >
 <tr><th class="col1"> Payment Receipt</th>
 <th class="col2">Payment type </th>
  <th class="col2">Amount</th> 
  <th class="col2">Date</th>
  
  <?php
  $pid=$_SESSION['ID'];
 $sql="select * from premium WHERE client_id='$pid' ";
 $result=$conn->query($sql);
 
 if($result->num_rows>0)
 {
	while($row = $result->fetch_assoc())
  {
    echo "<tr>
    <td>".$row["payment_id"]."</td>
    <td>".$row["type"]."</td>
    <td>".$row["value"]."</td>
    <td>".$row["date"]."</td></tr>";
  }

}

else
{
	echo "empty rows";
}

echo "</table>";
//close connection
$conn->close();
?>


  </tr>
</div>

</body>
</html>
