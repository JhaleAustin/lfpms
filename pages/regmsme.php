<?php
    include "../includes/dbcon.php";
    // getting all values from the HTML form
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $fullname = $_POST['fullName'];
        $username = $_POST['userName'];
        $phone = $_POST['phone'];
        $pass = $_POST['password'];
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO users (email, fullname, username, password, phone, usertype) VALUES ('$email', '$fullname', '$username', '$pass', '$phone', 2)";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {
        echo "<script>
                alert('Registration is successful! You can now login.');
                window.location.href='../';
            </script>";
    }
  
    // close connection
    mysqli_close($conn);
?>