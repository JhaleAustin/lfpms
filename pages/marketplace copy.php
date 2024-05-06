<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 || isset($_SESSION['id']) && $_SESSION['usertype'] == 2){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/marketplace.css">
    <title>Marketplace</title>
</head>
<body>

<div class="hero">
    <nav>
        <img src="../img/foodtrack.png" class="Foodtrack">
        <ul>
            <li><a href="home/">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="marketplace.php">Products</a></li>
            <li><a href="Dashbord.php">Dashboard</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <img src="../img/profile.png" class="user" id="userIcon">
        <div class="sub-menu-warp" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="../img/profile.png">
                    <h2><?php echo $_SESSION['fullname']; ?></h2>
                </div>
                <hr>
                <a href="logout.php" class="sub-menu-link">
                    <img src="../img/profile.png">
                    <p>Log out</p>
                </a>
            </div>
        </div>
    </nav>


<!-- Container with cards -->
</br>
</br>
<div class="container">
    <div class="card">
        <div class="imgBx">
            <a href="foods.php">
                <img src="../img/img1.jpg">
            </a>
            <h2>Baked Feta Pasta with Shrimp</h2>
            <p>Creamy, tangy, cheesy, and packed with extra herbs and perfectly cooked shrimp, this version of baked feta pasta is truly next level and totally worth the hype.</p>
        </div>
    </div>
    <div class="card">
        <div class="imgBx">
            <a href="foods.php">
                <img src="../img/img1.jpg">
            </a>
            <h2>Baked Feta Pasta with Shrimp</h2>
            <p>Creamy, tangy, cheesy, and packed with extra herbs and perfectly cooked shrimp, this version of baked feta pasta is truly next level and totally worth the hype.</p>
        </div>
    </div>
    <div class="card">
        <div class="imgBx">
            <a href="foods.php">
                <img src="../img/img1.jpg">
            </a>
            <h2>Baked Feta Pasta with Shrimp</h2>
            <p>Creamy, tangy, cheesy, and packed with extra herbs and perfectly cooked shrimp, this version of baked feta pasta is truly next level and totally worth the hype.</p>
        </div>
    </div>
    <div class="card">
        <div class="imgBx">
            <a href="foods.php">
                <img src="../img/img1.jpg">
            </a>
            <h2>Baked Feta Pasta with Shrimp</h2>
            <p>Creamy, tangy, cheesy, and packed with extra herbs and perfectly cooked shrimp, this version of baked feta pasta is truly next level and totally worth the hype.</p>
        </div>
    </div>
    <div class="card">
        <div class="imgBx">
            <a href="foods.php">
                <img src="../img/img1.jpg">
            </a>
            <h2>Baked Feta Pasta with Shrimp</h2>
            <p>Creamy, tangy, cheesy, and packed with extra herbs and perfectly cooked shrimp, this version of baked feta pasta is truly next level and totally worth the hype.</p>
        </div>
    </div>
</div>

</div>
<script src="../js/script.js"></script>
</body>
</html>
<?php
    }
    else{
        session_destroy();
        header("Location: home/");
    }
?>