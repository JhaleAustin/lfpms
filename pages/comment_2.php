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
<style>

.container4 {
    position: relative;
    width: 1100px;
    display: flex;
    align-items: row-reverse;
    flex-wrap: wrap;
    padding: 10;
   margin: 4% auto 0; }


/* Dropdown container */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #f1f1f1;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
.dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content, .submenu-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a, .submenu-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover, .submenu-content a:hover {
            background-color: #f1f1f1;
        }

        .show {
            display: block;
        }

        .dropdown-submenu {
            position: relative;
        }
</style>
</head>
<body>

<div class="hero">
    <nav>
        <img src="../img/foodtrack.png" class="Foodtrack">
        <ul>
            <li><a href="home/">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn" onclick="toggleDropdown()">Districts</a>
            <div id="districtDropdown" class="dropdown-content">
                <a href="javascript:void(0)" onclick="toggleSubmenu('district1')">District 1</a>
                <div id="district1" class="submenu-content">
                    <a href="marketplace.php?location=Guimbal">Oton</a>
                    <a href="marketplace.php?location=Igbaras">Tigbauan</a>
                    <a href="marketplace.php?location=Miagao">Guimbal</a>
                    <a href="marketplace.php?location=Oton">Tubungan</a>
                    <a href="marketplace.php?location=San Joaquin">Igbaras</a>
                    <a href="marketplace.php?location=Tigbauan">Miagao</a>
                    <a href="marketplace.php?location=Tubungan">San Joaquin</a>
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district2')">District 2</a>
                <div id="district2" class="submenu-content">
                    <a href="#">Alimodian</a>
                    <a href="#">Pavia</a>
                    <a href="#">Leganes</a>
                    <a href="#">Zarraga</a>
                    <a href="#">Leon</a>
                    <a href="#">Sta. Barbara</a>
                    <a href="#">New Lucena</a>
                    <a href="#">New Lucena</a>
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district3')">District 3</a>
                <div id="district3" class="submenu-content">
                    <a href="#">Cabatuan</a>
                    <a href="#">Pototan</a>
                    <a href="#">Maasin</a>
                    <a href="#">Lambunao</a>
                    <a href="#">Calinog</a>
                    <a href="#">Badiangan</a>
                    <a href="#">Bingawan</a>
                    <a href="#">Mina</a>
                    <a href="#">Janiuay</a>
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district4')">District 4</a>
                <div id="district4" class="submenu-content">
                    <a href="#">Passi City</a>
                    <a href="#">Dingle</a>
                    <a href="#">Banate</a>
                    <a href="#">Anilao</a>
                    <a href="#">Barotac Nuevo</a>
                    <a href="#">Dumangas</a>
                    <a href="#">Dueñas</a>
                    <!-- Add more locations as needed -->
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district5')">District 5</a>
                <div id="district5" class="submenu-content">
                    <a href="#">Estancia</a>
                    <a href="#">Barotac Viejo</a>
                    <a href="#">Ajuy</a>
                    <a href="#">Concepcion</a>
                    <a href="#">Sara</a>
                    <a href="#">San Dionisio</a>
                    <a href="#">Balasan </a>
                    <a href="#">Batad</a>
                    <a href="#">Carles</a>
                    <a href="#">Lemery </a>
                    <a href="#">San Rafael</a>
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district6')">Lone District</a>
                <div id="district6" class="submenu-content">
                    <a href="#">Iloilo City</a>
                    <!-- Add more locations as needed -->
                </div>
            </div>
        </li>
        <li><a href="marketplace.php">Products</a></li>
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
        <a href="../Dashboard.php" class="sub-menu-link">Dashboard</a>
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


 
 
 
 
<?php
 
    $user_id = $_GET['id'];
    $select_products = $conn->prepare("
    SELECT bi.* , p.*
    FROM products p
    JOIN users u ON p.msme_id = u.userid
    JOIN business_information bi ON u.userid = bi.userid
    WHERE p.product_id = ?");
    $select_products->bind_param("i", $user_id); // Assuming user_id is an integer

 
 if ($select_products->execute()) {
    $result = $select_products->get_result();
    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) { 
?>


<a href="./comment.php?id=<?= $fetch_products['product_id'] ?>">  
     
     <div class="container">
        <div class="imgBx">
             <img src="../pages/uploaded_img/<?= $fetch_products['productImage'];?>" alt="Nike Jordan Proto-Lyte Image">
         </div>
         <div class="details">
             <div class="content">
             <h2><?= $fetch_products['productName']; ?><br>
              
                 <h4>MSME : <?= $fetch_products['NBusiness']; ?><br>
                     <!-- <span>Running Collection</span> -->
                 </h4>
                 <h4>ADDRESS : <?= $fetch_products['BusinessAddress']; ?><br>
                     <!-- <span>Running Collection</span> -->
                 </h4>
                 <p>
                 <?= $fetch_products['productDetails']; ?></p>   
                  <button>Comment</button>
             </div>
         </div>
        
     </div>
  </a> 


  <?php

        
    
 
        }}
}
?>
</div>


</div>
<script src="../js/script.js"></script>
<script>
    function toggleDropdown() {
        var districtDropdown = document.getElementById("districtDropdown");
        districtDropdown.classList.toggle("show");
    }

    function toggleSubmenu(districtId) {
        var submenu = document.getElementById(districtId);
        submenu.classList.toggle("show");
    }
</script>
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