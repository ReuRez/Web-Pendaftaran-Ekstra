<?php
$targetDir = "img/"; // Directory where the image will be saved
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo json_encode(["success" => false, "message" => "File is not an image."]);
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($targetFile)) {
    echo json_encode(["success" => false, "message" => "Sorry, file already exists."]);
    $uploadOk = 0;
}

// Check file size (limit to 5MB)
if ($_FILES["file"]["size"] > 5000000) {
    echo json_encode(["success" => false, "message" => "Sorry, your file is too large."]);
    $uploadOk = 0;
}

// Allow certain file formats
if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
    echo json_encode(["success" => false, "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo json_encode(["success" => false, "message" => "Your file was not uploaded."]);
// If everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo json_encode(["success" => true, "filePath" => $targetFile]);
    } else {
        echo json_encode(["success" => false, "message" => "Sorry, there was an error uploading your file."]);
    }
}
?>