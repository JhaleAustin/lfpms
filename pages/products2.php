<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 || isset($_SESSION['id']) && $_SESSION['usertype'] == 2){

    include "../includes/dbcon.php";

    if(isset($_POST['add_product'])){

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
        $details = $_POST['details'];
        $details = filter_var($details, FILTER_SANITIZE_STRING);
        
        $image_01 = $_FILES['image_01']['name'];
        $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
        $image_size_01 = $_FILES['image_01']['size'];
        $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
        $image_folder_01 = '../pages/uploaded_img/'.$image_01;
        
        $select_products = $conn->prepare("SELECT * FROM `products` WHERE productName = ?");
        $select_products->bind_param("s", $name);
        $select_products->execute();
        $result = $select_products->get_result();
        
        if($result->num_rows > 0) {
            $message[] = 'Product name already exists!';
        } else {
            $insert_products = $conn->prepare("INSERT INTO `products`(msme_id, productName, productPrice, productImage, productDetails) VALUES (?, ?, ?, ?, ?)");
            $insert_products->bind_param("issss", $_SESSION["id"], $name, $price, $image_01, $details);
        
            if ($insert_products->execute()) {
                if ($image_size_01 > 2000000) {
                    $message[] = 'Image size is too large!';
                } else {
                    move_uploaded_file($image_tmp_name_01, $image_folder_01);
                    $message[] = 'New product added!';
                }
            } else {
                $message[] = 'Failed to add product!';
            }
        }};        
     
     if(isset($_GET['delete'])){
     
        $delete_id = $_GET['delete'];
        $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $delete_product_image->execute([$delete_id]);
        $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
        unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
        $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
        $delete_product->execute([$delete_id]);
        $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
        $delete_cart->execute([$delete_id]);
        $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
        $delete_wishlist->execute([$delete_id]);
        header('location:products.php');
     }
     
     
     ?>
     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/admin_style.css">
  <title>About Us</title>
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
        <img src="../img/profile.png" class="user" id="userIcon">
        <div class="sub-menu-warp" id="subMenu">
        <div class="sub-menu">
              <div class="user-info">
                     <a href="profile.php"> <img src="../img/profile.png">
                    <h2><?php echo $_SESSION['fullname']; ?></h2>
                </a></div>
                <hr>
                <a href="logout.php" class="sub-menu-link">
                    <img src="../img/profile.png">
                    <p>Log out</p>
                </a>
            </div>
        </div>
    </nav>



    
<section class="add-products">

<h1 class="heading">add product</h1>

<form action="" method="post" enctype="multipart/form-data">
   <div class="flex">
      <div class="inputBox">
         <span>product name (required)</span>
         <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
      </div>
      <div class="inputBox">
         <span>product price (required)</span>
         <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
      </div>
     <div class="inputBox">
         <span>image (required)</span>
         <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
     </div>
  
      <div class="inputBox">
         <span>product details (required)</span>
         <textarea name="details" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
      </div>
   </div>
   
   <input type="submit" value="add product" class="btn" name="add_product">
</form>

</section>

<section class="show-products">

<h1 class="heading">products added</h1>

<div class="box-container">
<?php
$select_products = $conn->prepare("SELECT * FROM `products`");
if ($select_products->execute()) {
    $result = $select_products->get_result();
    if ($result->num_rows > 0) {
        while ($fetch_products = $result->fetch_assoc()) { 
?>
<div class="box">
   <img src="../pages/uploaded_img/<?= $fetch_products['productImage']; ?>" alt="">
   <div class="name"><?= $fetch_products['productName']; ?></div>
   <div class="price">₱<span><?= $fetch_products['productPrice']; ?></span>/-</div>
   <div class="details"><span><?= $fetch_products['productDetails']; ?></span></div>
   <div class="flex-btn">
      <a href="update_product.php?update=<?= $fetch_products['product_id']; ?>" class="option-btn">update</a>
      <a href="products.php?delete=<?= $fetch_products['product_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
   </div>
</div>
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

</section>





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