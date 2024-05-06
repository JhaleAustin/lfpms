 <?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 ){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/marketplace.css">
    <link rel="stylesheet" href="../css/marketplace2.css">
    <title>Marketplace</title>
      <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

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

<div class="card">
   

<a href="./foods.php">  
     
     <div class="container">
        <div class="imgBx">
             <img src="https://github.com/anuzbvbmaniac/Responsive-Product-Card---CSS-ONLY/blob/master/assets/img/jordan_proto.png?raw=true" alt="Nike Jordan Proto-Lyte Image">
         </div>
         <div class="details">
             <div class="content">
                 <h2>Jordan Proto-Lyte <br>
                     <span>Running Collection</span>
                 </h2>
                 <p>
                     Featuring soft foam cushioning and lightweight, woven fabric in the upper, the Jordan Proto-Lyte is
                     made for all-day, bouncy comfort.
                     Lightweight Breathability: Lightweight woven fabric with real or synthetic leather provides
                     breathable support.
                     Cushioned Comfort: A full-length foam midsole delivers lightweight, plush cushioning.
                     Secure Traction: Exaggerated herringbone-pattern outsole offers traction on a variety of surfaces.
                 </p>   
                 <h3>Rs. 12,800</h3>
                 <button>Buy Now</button>
             </div>
         </div>
        
     </div>
  </a> 
  
    </div>



    <div class="card">
   
    

 <a href="./foods.php">  
     
    <div class="container">
       <div class="imgBx">
            <img src="https://github.com/anuzbvbmaniac/Responsive-Product-Card---CSS-ONLY/blob/master/assets/img/jordan_proto.png?raw=true" alt="Nike Jordan Proto-Lyte Image">
        </div>
        <div class="details">
            <div class="content">
                <h2>Jordan Proto-Lyte <br>
                    <span>Running Collection</span>
                </h2>
                <p>
                    Featuring soft foam cushioning and lightweight, woven fabric in the upper, the Jordan Proto-Lyte is
                    made for all-day, bouncy comfort.
                    Lightweight Breathability: Lightweight woven fabric with real or synthetic leather provides
                    breathable support.
                    Cushioned Comfort: A full-length foam midsole delivers lightweight, plush cushioning.
                    Secure Traction: Exaggerated herringbone-pattern outsole offers traction on a variety of surfaces.
                </p>   
                <h3>Rs. 12,800</h3>
                <button>Buy Now</button>
            </div>
        </div>
       
    </div>
 </a> 
  



 </div></div>
<script src="../js/script.js"></script>
   
</body>
</html>
<?php
    }
    else if(isset($_SESSION['id']) && $_SESSION['usertype'] == 2){
        header("Location: ./products2.php");
    }else{
        session_destroy();
        header("Location: home/");
    }
?> 