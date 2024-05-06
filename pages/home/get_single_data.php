<?php include('connection.php');
$userid = $_POST['id'];
$sql = "SELECT * FROM users WHERE userid='$userid' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
