<?php

include "../includes/dbcon.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $municipality = $_POST['municipality'];
    $phoneNumber = $_POST['phoneNumber'];
    $labelingFormat = $_POST['labelingformat'];
    $brandName = $_POST['brandName'];
    $productIdentity = $_POST['productIdentity'];
    $label1 = $_POST['label1'];
    $label2 = $_POST['label2'];
    $label3 = $_POST['label3'];
    $label4 = $_POST['label4'];
    $tagline = $_POST['tagline'];
    $netContent = $_POST['netContent'];
    $ingredients = $_POST['ingredients'];
    $expiryDate = $_POST['expiryDate'];

   
    // Prepare SQL statement to insert feedback
    $stmt = $conn->prepare("INSERT INTO ConsultancyQuestionnaire (
        name, address, municipality, phoneNumber, labelingFormat, brandName, 
        productIdentity, label1, label2, label3, label4, tagline, netContent, 
        ingredients, expiryDate) VALUES (?, ?,?, ?, ?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssssss",  $name, $address, $municipality, $phoneNumber, $labelingFormat, 
    $brandName, $productIdentity, $label1, $label2, $label3, 
    $label4, $tagline, $netContent, $ingredients, $expiryDate);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>
            alert('Feedback submitted successfully!');
            window.history.back();
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}


?>
