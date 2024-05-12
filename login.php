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
       .c1{
           display: flex;
    justify-content: center;
    align-content: center;
    
       } 
   
       .overlay {
	background: #274957;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #FF4B2B, #FF416C);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
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
	<form method="POST" action="./pages/login.php">
    <img src="img/foodtrack.png" class="Foodtrack">
   	<h1>LFPMS Login</h1>
			<span>or use your account</span>
			<input type="text" name="username" id="username" placeholder="Username" />
			<input type="password" name="password" id="password" placeholder="Password"/>
			<a href="#">Forgot your password?</a>
			<button name="submit" id="submit">Sign In</button>
	</form>
	</div>


	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Welcome to the Local Food 
Product Monitoring System 
(LFPMS)</h1>
				 <button class="ghost" onclick="redirectToSignUp1()">Sign Up</button>
			</div>
		</div>
	</div>


</div>
</div>
</div>
  
<script >
function redirectToSignUp1() {
  window.location.href = "signup.php"; 
}
</script>
</body>
</html>

<?php
    }
?>