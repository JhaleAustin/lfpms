<?php
    include "../includes/dbcon.php";
    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        $pass = $_POST['password'];
        $id = $_POST['id'];
        $username = $_POST['username'];
    }

    // using sql to create a data entry query
    $sql = "UPDATE users 
    SET fullname = '$fullname', 
        username = '$username', 
        password = '$pass', 
        phone = '$phone', 
        address = '$address' ,
    email = '$email'
    WHERE userid = '$id'";

    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {
        echo "<script>
                alert('Update Profile is successful!');
                window.location.href='profile.php';
            </script>";
    }
  
    // close connection
    mysqli_close($conn);
?>