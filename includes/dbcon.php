<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lfpms";

    // creating a connection
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$conn)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
?>