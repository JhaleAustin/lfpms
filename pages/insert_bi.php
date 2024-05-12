<?php
// Database connection
include "../includes/dbcon.php";
$id = $_POST['id'];
      

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

// Handle file upload and store filename
$NBusinessFilename = $_POST['nb'];
// $NBusinessFilename =$NBusinessFile["name"]; // Initialize filename
// if (!empty($NBusinessFile)) {
//     $uploadResult = uploadFile($NBusinessFile, $uploadDir);
//     $uploadResult = handleUploadResult($uploadResult, $errors);
//     if (!empty($uploadResult['uploaded'])) {
//         $NBusinessFilename = $uploadResult['uploaded'];
//     }
// } 

//
$BusinessAddressFile = $_FILES['ba'];
$BusinessAddressFilename = $BusinessAddressFile["name"]; // Initialize filename
if (!empty($BusinessAddressFile)) {
    $uploadResult = uploadFile($BusinessAddressFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $BusinessAddressFilename = $uploadResult['uploaded'];
    }
}
//
$TypeBusinessFile = $_FILES['tb'];
$TypeBusinessFilename = $TypeBusinessFile["name"]; // Initialize filename
if (!empty($TypeBusinessFile)) {
    $uploadResult = uploadFile($TypeBusinessFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $TypeBusinessFilename = $uploadResult['uploaded'];
    }
}
//
$brnFile = $_FILES['brn'];
$brnFilename = $brnFile["name"]; // Initialize filename
if (!empty($brnFile)) {
    $uploadResult = uploadFile($brnFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $brnFilename = $uploadResult['uploaded'];
    }
}
//
$vdFile = $_FILES['vd'];
$vdFilename = $vdFile["name"]; // Initialize filename
if (!empty($vdFile)) {
    $uploadResult = uploadFile($vdFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $vdFilename = $uploadResult['uploaded'];
    }
}
//
$BLcenseFile = $_FILES['bl'];
$BLcenseFilename = $BLcenseFile["name"]; // Initialize filename
if (!empty($BLcenseFile)) {
    $uploadResult = uploadFile($BLcenseFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $BLcenseFilename = $uploadResult['uploaded'];
    }
}
//
$tdFile = $_FILES['td'];
$tdFilename = $tdFile["name"]; // Initialize filename
if (!empty($tdFile)) {
    $uploadResult = uploadFile($tdFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $tdFilename = $uploadResult['uploaded'];
    }
}
//
$bpFile = $_FILES['bp'];
$bpFilename = $bpFile["name"]; // Initialize filename
if (!empty($bpFile)) {
    $uploadResult = uploadFile($bpFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $bpFilename = $uploadResult['uploaded'];
    }
}
//
$birFile = $_FILES['bir'];
$birFilename =$birFile["name"]; // Initialize filename
if (!empty($birFile)) {
    $uploadResult = uploadFile($birFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $birFilename = $uploadResult['uploaded'];
    }
}
//
$bbcFile = $_FILES['bbc'];
$bbcFilename = $bbcFile["name"] ;// Initialize filename
if (!empty($bbcFile)) {
    $uploadResult = uploadFile($bbcFile, $uploadDir);
    $uploadResult = handleUploadResult($uploadResult, $errors);
    if (!empty($uploadResult['uploaded'])) {
        $bbcFilename = $uploadResult['uploaded'];
    }
}



// Function to handle upload result and collect errors
function handleUploadResult($uploadResult, &$errors) {
    if (!empty($uploadResult['errors'])) {
        $errors = array_merge($errors, $uploadResult['errors']);
    }
    return $uploadResult;
}

// Insert data into database with file path
$NBusiness = $NBusinessFilename;
$BusinessAddress = $BusinessAddressFilename;
$TypeBusiness = $TypeBusinessFilename;
$brn =$brnFilename;
$VDocuments = $vdFilename;
$BLcense = $BLcenseFilename;
$TDocuments = $tdFilename;
$BPermit = $bpFilename;
$BIR = $birFilename;
$BBC = $bbcFilename;

$stmt = $conn->prepare("INSERT INTO business_information (userid,NBusiness, BusinessAddress, TypeBusiness, brn, VDocuments, BLcense, TDocuments, BPermit, BIR, BBC) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss",   $id 
,$NBusiness, $BusinessAddress, $TypeBusiness, $brn, $VDocuments, $BLcense, $TDocuments, $BPermit, $BIR, $BBC);

$conn->begin_transaction();
if ($stmt->execute() === TRUE) {
    echo "<script>
    alert('Update Business Information is successful!');
    window.location.href='profile.php';
</script>";
    $conn->commit();
} else {
    echo "Error: " . $stmt->error;
    $conn->rollback();
}

$stmt->close();

// $userID = 4; // Assuming 4 is the user ID you want to bind

// $stmt = $conn->prepare("SELECT * FROM business_information WHERE userid = ?");
// $stmt->bind_param("i", $userID); // Pass $userID by reference


// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc();

// // Display uploaded file with download link

// echo "<h2>Download File:</h2>";
// echo "<ul>";
// $file = $row['NBusiness'];
// echo "<li><a href='uploaded_files/" . $file . "' download><button class='download-button'><i class='fa fa-download'></i> Download</button></a></li>";
// echo "</ul>";



// $stmt->close();
// $conn->close();
?>
