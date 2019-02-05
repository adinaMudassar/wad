<?php
require_once("db.php");
$sql="SELECT * FROM album";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0)
{
    while($row = mysqli_fetch_array($result))
    {
        if($row["albumName"]==$_POST["album_name"])
        {
            echo "Album Already exist";
            //sleep(5);
            header('Location: http://localhost/assignment-4/addAlbum.php');
        }
    }
}
$target_dir = "album_photos/";
$target_file = $target_dir . basename($_FILES["album_photo"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . "photo-".time().".".$imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["album_photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        sleep(5);
        header('Location: http://localhost/assignment-4/addAlbum.php');
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["album_photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    sleep(5);
    header('Location: http://localhost/assignment-4/addAlbum.php');
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    sleep(5);
    header('Location: http://localhost/assignment-4/addAlbum.php');
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $pname=$_FILES["album_photo"]["tmp_name"];
    if (move_uploaded_file($_FILES["album_photo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["album_photo"]["name"]). " has been uploaded.";
        $sql="INSERT INTO album (albumName,albumPhoto) VALUES ('" . $_POST["album_name"] . "','" . $target_file . "')";
        mysqli_query($conn,$sql);
        $current_id = mysqli_insert_id($conn);
        if(!empty($current_id)) {
            echo "New album Added Successfully";
            //sleep(5);
        }
        else
        {
            echo "album NOT Added Successfully";
            //sleep(5);
        }
        //sleep(5);
        header('Location: http://localhost/assignment-4/loggedIn.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
        //sleep(5);
        header('Location: http://localhost/assignment-4/addAlbum.php');
    }
}
?>