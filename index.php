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
    <link rel="stylesheet" href="css/style.css">
    <title>Login Page</title>
</head>

<body>
    <div class="Log-in">
		<img src="img/foodtrack.png" alt="" width="250" height="100">
        <form method="POST" action="pages/login.php">
            <div class="input-container">
                <input type="text" class="Username" name="username" id="username" placeholder="Username" />
            </div>
            <div class="input-container">
                <input type="password" class="Password" name="password" id="password" placeholder="Password" />
            </div>
            <div class="remember-me">
                <input type="checkbox" id="rememberMeCheckbox">
                <label for="rememberMeCheckbox">Remember Me</label>
            </div>
            <div class="box6">
                <button name="submit" id="submit">Sign In</button>
            </div>
        </form>
			</br>
            <label>Don't have an account yet?</label>
            <div class="box6">
                <button onclick="redirectToSignUp()">Sign Up</button>
            </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>
<?php
    }
?>