<?php
// Database connection
include "../includes/dbcon.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['userid'];
    $rating = $_POST['rating'];
    $product_id = $_POST['product_id'];
    $comment = $_POST['comment'];
    $ratingValue = 0; // Default value

    // Check if the user has already submitted feedback
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM feedback WHERE userid = ? and product_id = ? ");
    $checkStmt->bind_param("ii", $id, $product_id );
    $checkStmt->execute();
    $checkStmt->bind_result($feedbackCount);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($feedbackCount > 0) {
        echo "<script>
            alert('You have already submitted feedback. Only one feedback per user is allowed.');
            window.history.back();
            window.location.reload(); // Reload the previous page
     
        </script>";
        exit(); // Stop further execution
    }

    // Assign equivalent values to each rating
    switch ($rating) {
        case 'Unsatisfied':
            $ratingValue = 1;
            break;
        case 'Neutral':
            $ratingValue = 2;
            break;
        case 'Happy':
            $ratingValue = 3;
            break;
    }

    // Prepare SQL statement to insert feedback
    $stmt = $conn->prepare("INSERT INTO feedback (rating, userid, product_id,rating_value, comment) VALUES (?, ?,?, ?, ?)");
    $stmt->bind_param("siiss", $rating, $id,$product_id, $ratingValue, $comment);

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

// Close connection
$conn->close();
?>
