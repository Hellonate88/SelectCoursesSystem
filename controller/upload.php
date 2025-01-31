<?php
$target_dir = "../images/";
$picName = isset($_POST['picID']) ? $_POST['picID'] : "";

$uploadOk = 1;
$filename = $_FILES["fileToUpload"]["name"];
$file_basename = substr($filename, 0, strripos($filename, '.'));
$file_ext = substr($filename, strripos($filename, '.'));
$newfilename = $picName . $file_ext;
$target_file = $target_dir.$newfilename;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../images/".$newfilename)) {
        echo "The file ". basename( $picName). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>