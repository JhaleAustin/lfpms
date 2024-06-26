<?php
	include('connection.php');
	session_start();
  
  if(isset($_SESSION['id']) && $_SESSION['usertype'] == 0){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <link rel="stylesheet" href="../../css/home.css">
  <title>Foodtrack Admin Panel</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="hero">
    <nav>
      <img src="../../img/foodtrack.png" class="Foodtrack">
	  <h3>Admin Panel</h3>
    </nav>
	</br>
	<div class="row">
      <div class="container">
        <div class="btnAdd">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">Add User</a>
		  <a href="logout.php" data-id="" class="btn btn-warning btn-sm">Logout</a>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table id="example" class="table">
              <thead>
                <th>Id</th>
                <th>Email</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>Phone</th>
				<th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
          },

        ]
      });
    });
    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      var email = $('#addemailField').val();
      var fullname = $('#addfullnameField').val();
	  var username = $('#addusernameField').val();
      var password = $('#addpasswordField').val();
      var phone = $('#addphoneField').val();
	  var usertype = $('#addusertypeField').val();
      if (email != '' && fullname != '' && username != '' && password != '' && phone != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            email: email,
			fullname: fullname,
            username: username,
            password: password,
            phone: phone,
			usertype: usertype
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
              $('#addUser')[0].reset();
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('submit', '#updateUser', function(e) {
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var email = $('#emailField').val();
      var fullname = $('#fullnameField').val();
      var username = $('#usernameField').val();
      var password = $('#passwordField').val();
	  var phone = $('#phoneField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (email != '' && fullname != '' && username != '' && password != '' && phone != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            email: email,
            fullname: fullname,
            username: username,
            password: password,
            phone: phone,
			id : id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-primary btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, email, fullname, username, password, phone, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#emailField').val(json.email);
		  $('#fullnameField').val(json.fullname);
		  $('#usernameField').val(json.username);
          $('#passwordField').val(json.password);
          $('#phoneField').val(json.phone);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
			<div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="emailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="fullnameField" class="col-md-3 form-label">Full Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="fullnameField" name="fullname">
              </div>
            </div>
			<div class="mb-3 row">
              <label for="usernameField" class="col-md-3 form-label">User Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="usernameField" name="username">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="passwordField" class="col-md-3 form-label">Password</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="passwordField" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="phoneField" class="col-md-3 form-label">Phone</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="phoneField" name="phone" pattern="\d*" required oninput="validatePhoneNumber(this)">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
			<div class="mb-3 row">
              <label for="addemailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="addemailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addfullnameField" class="col-md-3 form-label">Full Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addfullnameField" name="fullname">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addusernameField" class="col-md-3 form-label">Username</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addusernameField" name="username">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addpasswordField" class="col-md-3 form-label">Password</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addpasswordField" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addphoneField" class="col-md-3 form-label">Phone</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addphoneField" name="phone" pattern="\d*" required oninput="validatePhoneNumber(this)">
              </div>
            </div>
			<div class="mb-3 row">			  
			  <label for="addusertypeField" class="col-md-3 form-label">Usertype</label>
			  <div class="col-md-9">			  
				<select id="addusertypeField" class="form-control">  
				  <option value="0">Admin</option>  
				  <option value="1">Customer</option>
				  <option value="2">MSME</option>
				</select>
			  </div>
			</div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="../../js/script.js"></script>
</body>
</html>
<?php
  }
  else if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 || isset($_SESSION['id']) && $_SESSION['usertype'] == 2){
?>

<?php
     
    include "../../includes/dbcon.php";
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Foodtrack Home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
     <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style_2.css">

    <style>
        .hero2 {
            width: 100%;
            min-height: 100vh;
            background-size:cover;
            color: #525252;
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
  
<div class="hero2">
  <nav>
    <img src="../../img/foodtrack.png" class="Foodtrack">
    <ul>
      <li><a href="">Home</a></li>
      <li><a href="../about.php">About</a></li>
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
       <li><a href="../marketplace.php">Products</a></li>
       <li><a href="../contact.php">Contact Us</a></li>
    </ul>
    <img src="../../img/profile.png" class="user" id="userIcon">
    <div class="sub-menu-warp" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <img src="../../img/profile.png">
          <h2><?php echo $_SESSION['fullname']; ?></h2>
        </div>
        <hr>
        <a href="../Dashboard.php" class="sub-menu-link">Dashboard</a>
        <a href="assessment.php" class="sub-menu-link">Assessment</a>
       <hr>
        <a href="logout.php" class="sub-menu-link">
          <img src="../../img/profile.png">
          <p>Log out</p>
        </a>
      </div>
    </div>
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
         <img src="../../pages/uploaded_img/<?= $fetch_products['productImage']; ?>" alt="">
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
 

   <a href="../comment_2.php?id=<?= $fetch_products['product_id'] ?>" class="swiper-slide slide">
      <img src="../../pages/uploaded_img/<?= $fetch_products['productImage']; ?>" alt="">
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





</div>
  



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
<script src="../../js/script.js"></script>
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
    session_destroy();
    header("Location: ../../");
  }
?>