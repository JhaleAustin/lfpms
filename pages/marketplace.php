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
                    <a href="marketplace.php?location=Guimbal">Guimbal</a>
                    <a href="marketplace.php?location=Igbaras">Igbaras</a>
                    <a href="marketplace.php?location=Miagao">Miagao</a>
                    <a href="marketplace.php?location=Oton">Oton</a>
                    <a href="marketplace.php?location=San Joaquin">San Joaquin</a>
                    <a href="marketplace.php?location=Tigbauan">Tigbauan</a>
                    <a href="marketplace.php?location=Tubungan">Tubungan</a>
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district2')">District 2</a>
                <div id="district2" class="submenu-content">
                    <a href="#">Location 1</a>
                    <a href="#">Location 2</a>
                    <!-- Add more locations as needed -->
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district3')">District 3</a>
                <div id="district3" class="submenu-content">
                    <a href="#">Location 1</a>
                    <a href="#">Location 2</a>
                    <!-- Add more locations as needed -->
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district4')">District 4</a>
                <div id="district4" class="submenu-content">
                    <a href="#">Location 1</a>
                    <a href="#">Location 2</a>
                    <!-- Add more locations as needed -->
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district5')">District 5</a>
                <div id="district5" class="submenu-content">
                    <a href="#">Location 1</a>
                    <a href="#">Location 2</a>
                    <!-- Add more locations as needed -->
                </div>
                <a href="javascript:void(0)" onclick="toggleSubmenu('district6')">District 6</a>
                <div id="district6" class="submenu-content">
                    <a href="#">Location 1</a>
                    <a href="#">Location 2</a>
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


<div>  

    <div class="container4" >
  
    <div class="dropdown">
    <form method="post" action="">
    <select name="district" class="dropbtn" id="district-select" onchange="this.form.submit()">
        <option value="">Select District</option>
        <div class="dropdown-content">
 <?php
$select_products = $conn->prepare("SELECT * FROM users WHERE usertype=2");
$select_products->execute();

if ($select_products->execute()) {
    $result = $select_products->get_result();
    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) { 
          echo '<option class="district-link" value="' . $fetch_products['district'] . '">' . $fetch_products['district'] . '</option>';
            }}}
        ?>
    </select>
</form>
    
 

<?php
// PHP variable to store the selected value
$store = "";

// Check if form is submitted and get selected district
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['district'])) {
        $store = $_POST['district'];
    }
}
?>

        </div>
    </div>


</div>


<?php
$select_products = $conn->prepare("SELECT * FROM `users` where district = ?");
$select_products->bind_param("s", $store);
if ($select_products->execute()) {
    $result = $select_products->get_result();
    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) { 
?>


<div class="container">
  
    <div class="imgBx">
        <img src="../pages/uploaded_img/mango.png" alt="Nike Jordan Proto-Lyte Image">
    </div>
    <div class="details">
        <div class="content">
            <h2><?= $fetch_products['fullname']; ?><br>
                <!-- <span>Running Collection</span> -->
            </h2>
            <p>Literary texts are texts that use language creatively to express ideas, emotions, and stories123.Some types of literary texts and examples are123:
Lyrical texts: poems that express emotions and feelings, such as "An Idle Fellow" by Kate Chopin.
Narrative texts: stories that tell events and actions, such as fairy tales, mysteries, science fiction, etc. For example, "An Imperial Message" by Franz Kafka.
Theatrical or dramatic texts: texts that are written for performance, such as plays, scripts, dialogues, etc.
Didactic or essay texts: texts that aim to inform, persuade, or teach, such as articles, reports, reviews, etc.</p>   
             
        </div>
    </div>
</div>
        <?php
        }}}
   ?>
<?php

//$select_products = $conn->prepare("SELECT * FROM `products` where district=".$_GET['Guimbal']);
   
if (isset($_GET['location'])){

   // $select_products = $conn->prepare("SELECT * FROM `users` where district=".$_GET['Guimbal']);
  
  
    $district = $_GET['location'];

    // Prepare and execute the query to get the user ID based on the district
    $select_user_id = $conn->prepare("SELECT userid FROM users WHERE district = ?");
    $select_user_id->bind_param("s", $district); // Assuming district is a string
    $select_user_id->execute();
    $result = $select_user_id->get_result();

    // Fetch the user ID
    $row = $result->fetch_assoc();
    $user_id = $row['userid'];

    // Free the result and close the statement
    $result->free();
    $select_user_id->close();

    // Now, you have the user ID, you can use it to query for products associated with that user
    // Prepare and execute the query to select all products where msme_id equals user_id
    $select_products = $conn->prepare("SELECT * FROM products WHERE msme_id = ?");
    $select_products->bind_param("i", $user_id); // Assuming user_id is an integer



    if ($select_products->execute()) {
        $result = $select_products->get_result();
        if ($result->num_rows > 0) {
            while ($fetch_products = $result->fetch_assoc()) { 
    ?>
    
    
    <a href="./foods.php?id=<?= $fetch_products['product_id'] ?>">  
         
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


}else{

$select_products = $conn->prepare("SELECT * FROM `products`");
if ($select_products->execute()) {
    $result = $select_products->get_result();
    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) { 
?>


<a href="./foods.php?id=<?= $fetch_products['product_id'] ?>">  
     
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