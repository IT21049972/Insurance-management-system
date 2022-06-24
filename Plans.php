<!DOCTYPE html>
<html>

<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles/unity.css">
<script src="js/script.js"></script>
 <title>Unity health</title>
<style>
  body {
    width: 100%;
    height: 140vh;
    background-image: url("images/background.png");
    background-position: center;
    background-size: cover;
  }
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #73a5c6;
  color: white;
}
</style>
 </head>

 <body> 
  <div class="navbar">
    <div class="icon">
        <h2 class="logo">UNITY HEALTH INSURANCE</h2>
    </div>
    <div class="menu">
        <ul>
          <li><a href="home.php">HOME</a></li>
          <li><a href="#">POLICIES</a></li>
          <li><a href="services.php">SERVICES</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="contact.php">CONTACT</a></li>
        </ul>
    </div>

    <div class="search">
        <input class="srch" type="search" name="" placeholder="Type to text">
        <a href="#"><button class="btn">search</button></a>
    </div>
    <center>
    <div class="plans">
      <input type="image" class="b" id="btn1" src="images/icon-sign-information-age-limit-vector-illustration-148222572.jpg" onclick="loadData('btn1')" name="submit" width="200" height="200" alt="submit"/>
      <input type="image" class="b" id="btn1" src="images/family.jpg" onclick="loadData('btn2')" name="submit" width="200" height="200" alt="submit"/>
      <input type="image" class="b" id="btn1" src="images/pngtree-cartoon-character-injured-on-crutches-png-image_2386643.jpg" onclick="loadData('btn3')" name="submit" width="200" height="200" alt="submit"/>
      <input type="image" class="b" id="btn1" src="images/critical-rubber-stamp-word-inside-illustration-92047251.jpg" onclick="loadData('btn4')" name="submit" width="200" height="200" alt="submit"/>
      <input type="image" class="b" id="btn1" src="images/Spa-Workplace-Wellness.jpg" onclick="loadData('btn5')" name="submit" width="200" height="200" alt="submit"/>
    </div>
  </center>
<br>
<br>
<br>
<center>
<img id="image1" style = "height:200px; width:200px;border-radius:20px;"src="images/Top-Health-Insurance-Plans-To-Buy-in-2021.jpg">
<center><h2 id="title"><center>Insurance plans we offer</center></h2></center><br>
<p class="text1" id="para">Health insurance is a sort of coverage that pays for medical expenses in the event of a medical emergency. A health insurance plan provides the insured with a variety of advantages, such as cashless hospitalization, day-care services, and coverage for terminal and severe illnesses, among others.</p>
<br>
<button class='button2'><a href="registration.php">Register</a></button>
</center>
</br></br>
 <hr>
</center>
 <br>

 <center><footer>
  <p>  Copyright © 2021 :Unity health. All rights reserved<br>
 <hr>
</footer>
 </center>
 </body>
</html>
