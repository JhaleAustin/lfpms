<?php
    session_start();

    if(isset($_SESSION['id']) && $_SESSION['usertype'] == 1 || isset($_SESSION['id']) && $_SESSION['usertype'] == 2){
      include "../includes/dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-L+U8sl4TPJGSlq5m8gMUJPhmm1HJeKJWvef8AEwcfktDCxlr+ZihTXgyr6IX8MllrJlzvyGJRdHh12z5v3W63Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="../css/profile.css">  
      <title>Foods</title>

      <style>
    .download-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .download-button:hover {
        background-color: #0056b3;
    }

    .btn-delete-account {
        padding: 10px 20px;
        background-color: #dc3545; /* Red color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-delete-account:hover {
        background-color: #c82333; /* Darker red color on hover */
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
        <a href="../Dashboard.php" class="sub-menu-link">Dashboard</a>
        <hr>
                <a href="logout.php" class="sub-menu-link">
                    <img src="../img/profile.png">
                    <p>Log out</p>
                </a>
            </div>
        </div>
    </nav>
 
    <div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['fullname']; ?></h4>
                      <button class="btn btn-delete-account">Delete Account</button>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
            
                <div class="card-body">
    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Profile</i> Information</h6>
    <?php if(isset($_GET['edit']) && $_GET['edit'] == 'true'): ?>
        <form method="post" action="save_profile.php">
        <input type="text" class="form-control" name="id" value="<?php echo $_SESSION['id']; ?>" hidden>
         
        <?php
// Assuming you have a database connection established

// Fetch user details based on user ID
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE userid = '$user_id'";
$result = mysqli_query($conn, $sql);

// Check if the query returned any rows
if(mysqli_num_rows($result) > 0) {
    // Fetch user data
    $user = mysqli_fetch_assoc($result);
?>

            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="fullname" value="<?php echo $user['fullname']; ?>">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                </div>
            </div>
            <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
               </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>">
                </div>
                  </div>
           
            <hr>
            <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
                </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="password" value="<?php echo $user['password']; ?>">
                </div>
                  </div>
            </div>
            <!-- Add more editable fields here as needed -->

            <?php
} else {
    echo "User not found!";
}
?>
            <!-- Save button -->
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                    <a class="btn btn-secondary" href="?edit=false">Cancel</a>
                </div>
            </div>
        </form>


        <div class="col-md-8">
          
   

    <?php else: ?>
      <?php
// Assuming you have a database connection established

// Fetch user details based on user ID
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE userid = '$user_id'";
$result = mysqli_query($conn, $sql);

// Check if the query returned any rows
if(mysqli_num_rows($result) > 0) {
    // Fetch user data
    $user = mysqli_fetch_assoc($result);
?>


<div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php echo $user['fullname']; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php echo $user['email']; ?>
            </div>
        </div>
        <hr>
        <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $user['phone']; ?>
              </div>
                  </div>
                 
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $user['address']; ?>
             </div>
                  </div>
                  <?php
} else {
    echo "User not found!";
}
?>
        <!-- Display more fields here as needed -->

        <!-- Edit button -->
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-info" href="?edit=true">Edit</a>
            </div>
        </div>
    <?php endif; ?>
</div>





<div class="col-md-8">
         
<div class="card-body">
    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Business</i> Information</h6>
    <?php if(isset($_GET['edit2']) && $_GET['edit2'] == 'true'): ?>
        <form method="post" action="insert_bi.php" enctype="multipart/form-data">
        <input type="text" class="form-control" name="id" value="<?php echo $_SESSION['id']; ?>" hidden>
       <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Name of Business</h6>
                </div>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="nb" id="nb">
           
                  </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Business Address</h6>
                </div>
                <div class="col-sm-9">
                <input type="file" name="ba"  accept=".pdf,.doc,.docx">
       </div>
            </div>
            <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type of Business</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="tb"  accept=".pdf,.doc,.docx">
     </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Business Registration Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="brn"  accept=".pdf,.doc,.docx">
      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Verification Documents</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="vd"  accept=".pdf,.doc,.docx">
    </div>
                  </div>
           
           
            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Business License</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="bl"  accept=".pdf,.doc,.docx">
     </div>
                  </div>
           
            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tax Documents</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="td"  accept=".pdf,.doc,.docx">
      </div>
                  </div>
          
            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Business Permit</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="bp"  accept=".pdf,.doc,.docx">
      </div>
                  </div>
          
            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">BIR</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="bir"  accept=".pdf,.doc,.docx">
     </div>
                  </div>
           
            <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Baranggay Business Clearance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="file" name="bbc"  accept=".pdf,.doc,.docx">
     </div>
                  </div>
            </div>
            <!-- Add more editable fields here as needed -->

            <!-- Save button -->
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a class="btn btn-secondary" href="?edit=false">Cancel</a>
                </div>
            </div>
        </form>
    <?php else:
      

$stmt = $conn->prepare("SELECT * FROM business_information WHERE userid = ?");
$stmt->bind_param("i",$_SESSION['id']); // Pass $userID by reference


$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Display uploaded file with download link

echo "<small>Name of Business</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['NBusiness'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Business Address</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['BusinessAddress'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Type of Business</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['TypeBusiness'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Business Registration Number</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['brn'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Verification Documents</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['VDocuments'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Business License</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['BusinessAddress'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";



echo "<small>Tax Documents</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['BLcense'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Business Permit</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['BPermit'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>BIR</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['BIR'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";


echo "<small>Baranggay Business Clearance</small>";

echo "<div class='col-sm-9 text-secondary'>";
$file = $row['BBC'];
echo  $file ." <a href='uploaded_file/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a>";
echo "</div>";
$stmt->close();

      ?>         
                 </div>
      
                 <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-info" href="?edit2=true">Edit</a>
            </div>
        </div>
    <?php endif; ?>
</div>

                  </div>
                </div>
              </div>


              
              


            </div>
          </div>

        </div>
    </div> 
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('input[name="star"]').on('change',function(){
        $('.star-label').removeClass('selected');
        $('.star-label[for=star'+$(this).val()+']').addClass('selected');
    });
</script>
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