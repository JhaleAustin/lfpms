<?php
    session_start();
    include "../includes/dbcon.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {

        function validate($data){
           $data = trim($data); 
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
    
        if (empty($username)) {
            echo "<script>
                alert('Username is required!');
                window.location.href='../';
            </script>";
    
            exit();
        }else if(empty($password)){
            echo "<script>
                alert('Password is required!');
                window.location.href='../';
            </script>";
    
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) === 1) {   
                $row = mysqli_fetch_assoc($result); 
                if ($row['username'] === $username && $row['password'] === $password) {
                    
                    $_SESSION['id'] = $row['userid'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['usertype'] = $row['usertype'];
    
                    header("Location: home/");
    
                    exit();
                }else{
                    echo "<script>
                        alert('Incorrect username or password!');
                        window.location.href='../';
                    </script>";

                    exit();
                }
            }else{
                echo "<script>
                        alert('Incorrect username or password!');
                        window.location.href='../';
                    </script>";

                exit();
            }
        }  
    }else{
        header("Location: ../");
        exit();
    }
?>