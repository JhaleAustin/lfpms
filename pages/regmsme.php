<?php
include "../includes/dbcon.php";

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get all values from the HTML form
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
      $pass = $_POST['password'];

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (email, fullname, username, password, usertype) VALUES (?, ?, ?, ?, 2)");
    $stmt->bind_param("ssss", $email, $fullname, $username, $pass);

    // Execute the statement
    if ($stmt->execute()) {
        // Get the ID of the newly created user
        $id = $stmt->insert_id;

        $uploadDir = "uploaded_file/";
        $errors = []; // Initialize errors array

        // Function to handle file upload
        function uploadFile($file, $uploadDir) {
            $errors = [];

            if ($file['error'] == UPLOAD_ERR_OK) {
                $tmp_name = $file["tmp_name"];
                $name = basename($file["name"]);
                $target_file = $uploadDir . $name;

                if (move_uploaded_file($tmp_name, $target_file)) {
                    return $target_file; // Return the filename if upload is successful
                } else {
                    $errors[] = "Failed to upload $name.";
                }
            } elseif ($file['error'] != UPLOAD_ERR_NO_FILE) {
                $errors[] = "Error uploading " . $file['error'];
            }

            return ['uploaded' => null, 'errors' => $errors];
        }


        function handleUploadResult($uploadResult, &$errors) {
            if (!empty($uploadResult['errors'])) {
                $errors = array_merge($errors, $uploadResult['errors']);
            }
            return $uploadResult;
        }
        
        $nameofbusiness = $_POST['nameofbusiness'];
        $businessAddress = $_POST['businessAddress'];
        $typeofbusiness = $_POST['typeofbusiness'];
        $bnr = $_POST['bnr'];
        $tin = $_POST['tin'];

        // Handle file uploads
      
        $BLcenseFile = $_FILES['bl'];
$BLcenseFilename = $BLcenseFile["name"]; // Initialize filename
if (!empty($BLcenseFile)) {
    $uploadResult = uploadFile($BLcenseFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $BLcenseFilename = $uploadResult['uploaded'];
    }
}

$tdFile = $_FILES['td'];
$tdFilename = $tdFile["name"]; // Initialize filename
if (!empty($tdFile)) {
    $uploadResult = uploadFile($tdFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $tdFilename = $uploadResult['uploaded'];
    }
}

$bpFile = $_FILES['bp'];
$bpFilename = $bpFile["name"]; // Initialize filename
if (!empty($bpFile)) {
    $uploadResult = uploadFile($bpFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $bpFilename = $uploadResult['uploaded'];
    }
}
        // $BLcense = handleUpload('bl', $uploadDir, $errors);
        // $TDocuments = handleUpload('td', $uploadDir, $errors);
        // $BPermit = handleUpload('bp', $uploadDir, $errors);
        // function handleUpload($fileInputName, $uploadDir, &$errors) {
        //     if (isset($_FILES[$fileInputName])) {
        //         $uploadResult = uploadFile($_FILES[$fileInputName], $uploadDir);
        //         if (!empty($uploadResult['uploaded'])) {
        //             return $uploadResult['uploaded'];
        //         } else {
        //             $errors = array_merge($errors, $uploadResult['errors']);
        //         }
        //     }
        //     return null;
        // }

    

$BLcense = $BLcenseFilename;
$TDocuments = $tdFilename;
$BPermit = $bpFilename;
        // Insert business information into the database
        $stmt = $conn->prepare("INSERT INTO business_information (userid, NBusiness, BusinessAddress, TypeBusiness, brn, BLcense, TDocuments, BPermit) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssss", $id, $nameofbusiness, $businessAddress, $typeofbusiness, $bnr, $BLcense, $TDocuments, $BPermit);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registration is successful!');
                window.location.href='../login.php';
            </script>";
            $conn->commit();
        } else {
            echo "Error: " . $stmt->error;
            $conn->rollback();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>
            alert('Registration failed. Please try again.');
            window.location.href='../register.php';
        </script>";
    }

    // Close connection
    $conn->close();
}
?>
