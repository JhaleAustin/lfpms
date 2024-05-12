<?php
session_start();
include "../includes/dbcon.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_SESSION['id']) && ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2)) {
    if(isset($_POST['send'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['msg'];

        // Prepare SQL statement to insert data into contacts table
        $sql = "INSERT INTO contacts (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

        if(mysqli_query($conn, $sql)) {
             echo "<script>
            alert('Message sent successfully');
            window.history.back();
            window.location.reload(); // Reload the previous page
     
        </script>"; } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <!-- HTML content -->
</body>
</html>

<?php
    mysqli_close($conn);
} else {
    session_destroy();
    header("Location: home/");
}
?>
