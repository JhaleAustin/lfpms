<?php
     
    include "includes/dbcon.php";
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Foodtrack Home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style_2.css">


    <style>
        .hero2 {
            width: 100%;
            min-height: 100vh;
            background-size:cover;
            color: #525252;

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
  
<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">
   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if ($select_products->execute()) {
      $result = $select_products->get_result();
      if ($result->num_rows > 0) {
          while ($fetch_products = $result->fetch_assoc()) { 
          ?>
 
      <div class="swiper-slide slide">
         <div class="image">
         <img src="pages/uploaded_img/<?= $fetch_products['productImage']; ?>" alt="">
         </div>
       <!-- <div class="content">
            <span>upto 50% off</span>
            <h3>latest headsets</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div> -->
      </div>

     
     
      <?php
      }
   } }
   ?>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Top Products</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">
   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if ($select_products->execute()) {
      $result = $select_products->get_result();
      if ($result->num_rows > 0) {
          while ($fetch_products = $result->fetch_assoc()) { 
          ?>
 

   <a href="category.php?category=station5" class="swiper-slide slide">
      <img src="pages/uploaded_img/<?= $fetch_products['productImage']; ?>" alt="">
      <h3><?= $fetch_products['productName']; ?></h3>
   </a>

   <?php
      }
   } }
   ?>




   

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>





<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>


<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>