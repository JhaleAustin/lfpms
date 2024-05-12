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
    <title>Contact Us</title>

    <style>
   
   .contact form{
      padding:2rem;
      text-align: center;
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      border-radius: .5rem;
      border:var(--border);
      max-width: 50rem;
      margin:0 auto;
   }
   
   .contact form h3{
      margin-bottom: 1rem;
      text-transform: capitalize;
      font-size: 2.5rem;
      color:var(--black);
   }
   
   .contact form .box{
      margin:1rem 0;
      width: 100%;
      background-color: var(--light-bg);
      padding:1.4rem;
      font-size: 1.8rem;
      color:var(--black);
      border-radius: .5rem;
   }
   
   .contact form textarea{
      height: 15rem;
      resize: none;
   }
   
.btn,
.delete-btn,
.option-btn{
   display: block;
   width: 100%;
   margin-top: 1rem;
   border-radius: .5rem;
   padding:1rem 3rem;
   font-size: 1.7rem;
   text-transform: capitalize;
   color:var(--white);
   cursor: pointer;
   text-align: center;
}

.btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
}

.btn{
   background-color: var(--main-color);
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   background-color: var(--red);
}

.flex-btn{
   display: flex;
   gap:1rem;
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
            <li><a href="marketplace.php">Products</a></li>
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <img src="../img/profile.png" class="user" id="userIcon">
        <div class="sub-menu-warp" id="subMenu">
        <div class="sub-menu">
              <div class="user-info">
                     <a href="about.php"> <img src="../img/profile.png">
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


    <section class="contact">

   <form action="insert_contact.php" method="post">
      <h3>get in touch</h3>
      <input type="text" name="name" placeholder="enter your name" required maxlength="20" class="box">
      <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
      <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box">
      <textarea name="msg" class="box" placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>

</section>

</div>

<script src="../js/script.js"></script>
</body>
</html>
<?php
    }
    else{
      ?>
       
       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Foodtrack Home</title>

    <style>
        .hero2 {
            width: 100%;
            min-height: 100vh;
            background: url('../img/home.png') center center no-repeat;
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
    <img src="../img/foodtrack.png" class="Foodtrack">
    <ul>
	<li><a href="../">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact Us</a></li>
     <li><a href="../login.php"  >Login</a></li>
  
    </ul>
	  
 
      
  </nav>
</div>
  
<script src="../../js/script.js"></script>
</body>
</html>





<?php
    }
?>