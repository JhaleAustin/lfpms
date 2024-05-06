<?php 
include('connection.php');
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone= $_POST['phone'];
$id = $_POST['id'];

$sql = "UPDATE `users` SET  `email`= '$email' ,`fullname`='$fullname' , `username`='$username', `password`='$password',  `phone`='$phone' WHERE `userid`='$id' ";
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