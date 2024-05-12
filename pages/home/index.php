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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/home.css">
    <title>Foodtrack Home</title>

    <style>
        .hero2 {
            width: 100%;
            min-height: 100vh;
            background: url('../../img/home.png') center center no-repeat;
            background-size:cover;
            color: #525252;
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
      <li><a href="../marketplace.php">Products</a></li>
      <li><a href="../Dashboard.php">Dashboard</a></li>
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
        <a href="logout.php" class="sub-menu-link">
          <img src="../../img/profile.png">
          <p>Log out</p>
        </a>
      </div>
    </div>
  </nav>
</div>
  
<script src="../../js/script.js"></script>
</body>
</html>

<?php
  }
  else{
    session_destroy();
    header("Location: ../../");
  }
?>