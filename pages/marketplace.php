<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 ){

        
    include "../includes/dbcon.php";

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


<div>

<?php
$select_products = $conn->prepare("SELECT * FROM `products`");
if ($select_products->execute()) {
    $result = $select_products->get_result();
    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) { 
?>


<a href="./foods.php?id=<?= $_SESSION['id'] ?>">  
     
     <div class="container">
        <div class="imgBx">
             <img src="../pages/uploaded_img/<?= $fetch_products['productImage'];?>" alt="Nike Jordan Proto-Lyte Image">
         </div>
         <div class="details">
             <div class="content">
                 <h2><?= $fetch_products['productName']; ?><br>
                     <!-- <span>Running Collection</span> -->
                 </h2>
                 <p>
                 <?= $fetch_products['productDetails']; ?></p>   
                 <h3>₱<span><?= $fetch_products['productPrice']; ?></h3>
                 <button>Comment</button>
             </div>
         </div>
        
     </div>
  </a> 


  <?php
        }
    } else {
        echo '<p class="empty">No products added yet!</p>';
    }
} else {
    // Error occurred
    $errorInfo = $select_products->error;
    echo 'Error: ' . $errorInfo;
}
?>
</div>


</div>
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