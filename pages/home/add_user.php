<?php 
include('connection.php');
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$usertype = $_POST['usertype'];

$sql = "INSERT INTO `users` (`email`,`fullname`,`username`,`password`,`phone`,`usertype`) values ('$email', '$fullname', '$username', '$password', '$phone', '$usertype' )";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>