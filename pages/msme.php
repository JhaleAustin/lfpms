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
    <link rel="stylesheet" href="../css/home.css">
    <title>Foodtrack Home</title>
  <link rel="stylesheet" href="../css/style2.css">
  
    <style>
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

   
        .toggle-button {
            position: absolute;
            right: 10px;
            cursor: pointer;
            background: none;
            border: none;
            margin-top: 150px;
        }

        
        .toggle-button2 {
            position: absolute;
            right: 10px;
            cursor: pointer;
            background: none;
            border: none;
            margin-top: 260px;
        }
        .form-group input {
            width: 100%;
            padding-left: 30px; /* space for the toggle button */
        }
    </style>
</head>
<body>
  
<div class="hero2">
  <nav>
    <img src="../img/foodtrack.png" class="Foodtrack">
    <ul>
    <li><a href="./">Home</a></li>
      <li><a href="pages/about.php">About</a></li>
      <li><a href="pages/contact.php">Contact Us</a></li>
     <li><a href="login.php"  >Login</a></li>
  
    </ul>
  </nav>


  <div class="c1">

 
<div class="container" id="container">
	
	  <form method="POST" action="./pages/login.php" onsubmit="return validateForm()">
        <img src="../img/foodtrack.png" class="Foodtrack">
        <h1>LFPMS Sign up</h1>
        <span>Create account for Customers</span>
        <input type="email" name="email" id="email" placeholder="Email" required />
        <input type="text" name="fullname" id="fullname" placeholder="Fullname" required />
        <input type="text" name="username" id="username" placeholder="Username" required />
        
            <input type="password" name="password" id="password" placeholder="Password" required />
            <button type="button" class="toggle-button" onclick="togglePasswordVisibility('password')">👁️</button>
       
          <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Repeat Password" required />
            <button type="button" class="toggle-button2" onclick="togglePasswordVisibility('passwordCheck')">👁️</button>
       
        <button type="submit" name="submit" id="submit">Create Account</button>
    </form>
	

	


</div>
</div>
</div>
<script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const passwordCheck = document.getElementById('passwordCheck').value;
            if (password !== passwordCheck) {
                alert('Passwords do not match.');
                return false;
            }
            return true;
        }

        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            if (field.type === 'password') {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        }
    </script>
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