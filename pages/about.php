<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 || isset($_SESSION['id']) && $_SESSION['usertype'] == 2){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/about.css">
    <title>About Us</title>

    <style>
    
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
                     <a href="profile.php"> <img src="../img/profile.png">
                    <h2><?php echo $_SESSION['fullname']; ?></h2>
                </a></div>
                <hr>
        <a href="../Dashboard.php" class="sub-menu-link">Dashboard</a>
        <a href="assessment.php" class="sub-menu-link">Assessment</a>
      <hr>
                <a href="logout.php" class="sub-menu-link">
                    <img src="../img/profile.png">
                    <p>Log out</p>
                </a>
            </div>
        </div>
    </nav>

     


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
            background: url('../img/about.png') center center no-repeat;
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