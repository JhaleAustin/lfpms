<?php
    session_start();
    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Your Website</title>
</head>
<body>

<div class="hero">
    <nav>
        <img src="../img/foodtrack.png" class="Foodtrack">
        <ul>
            <li><a href="home/">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="marketplace.php">Products</a></li>
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <img src="profile.png" class="user" id="userIcon">
        <div class="sub-menu-warp" id="subMenu">
        <div class="sub-menu">
              <div class="user-info">
                     <a href="profile.php"> <img src="../img/profile.png">
                    <h2><?php echo $_SESSION['fullname']; ?></h2>
                </a></div>
                <hr>
                <a href="#" class="sub-menu-link">
                    <img src="profile.png">
                    <p>Edit Profile</p>
                    <span></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <img src="profile.png">
                    <p>Settings</p>
                    <span></span>
                </a>
                <a href="logout.php" class="sub-menu-link">
                    <img src="profile.png">
                    <p>Log out</p>
                    <span></span>
                </a>
            </div>
        </div>
    </nav>
</div>

<script src="../js/script.js"></script>
</body>
</html>
<?php
    }
    else
    {
        session_destroy();
        header("Location: index.php");
    }
?>