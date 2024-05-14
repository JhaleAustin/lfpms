<?php
    session_start();
    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 0){
        header("Location: pages/home/");
    }
    else if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1){
        header("Location: pages/home/");
    }
    else if(isset($_SESSION['id']) && $_SESSION['usertype'] == 2){
        header("Location: pages/home/");
    }
    else
    {
        session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Foodtrack Home</title>
  <link rel="stylesheet" href="css/style2.css">

    <style>

 

    .form-container {
        text-align: center;
        background-color: #ffffff;
        padding: 90px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .customer-button,
    .msme-button {  
        width: 200px;
        margin-top: 40px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

       .c1{
           display: flex;
    justify-content: center;
    align-content: center;
    
       } 
   
   
    ul {
        list-style-type: none;
        padding: 0;
    }
    li {
        margin-bottom: 10px;
    }
    li a {
        text-decoration: none;
        color: #000000; /* Black text */
        font-weight: bold;
    }
 

    
    </style>
</head>
<body>
  
<div class="hero2">
  <nav>
    <img src="img/foodtrack.png" class="Foodtrack">
    <ul>
      <li><a href="./">Home</a></li>
      <li><a href="pages/about.php">About</a></li>
      <li><a href="pages/contact.php">Contact Us</a></li>
     <li><a href="login.php"  >Login</a></li>
  
    </ul>
  </nav>


  <div class="c1">

 
<div class="container" id="container">
	
<div class="form-container sign-in-container">
<img src="img/foodtrack.png" class="Foodtrack">
   	
<h2>Sign Up</h2>
			
  <button class="customer-button" onclick="redirectToCustomer('customer')">Customer</button><br>
    <button class="customer-button" onclick="redirectToMSME()">MSME</button>
</div>

<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-right">
            <h1>Welcome to the Local Food Product Monitoring System (LFPMS)</h1>
        </div>
    </div>
</div>


</div>
</div>
</div>
  
<script >
function redirectToCustomer() {
  window.location.href = "pages/Customer.php"; // Redirect to customer.php
}

function redirectToMSME() {
  window.location.href = "pages/msme.php";
}
</script>
</body>
</html>

<?php
    }
?>