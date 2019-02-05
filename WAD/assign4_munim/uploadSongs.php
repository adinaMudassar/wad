<?php
require_once("db.php");
$sql="SELECT * FROM songs";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0)
{
    while($row = mysqli_fetch_array($result))
    {
        if($row["songName"]==$_POST["song_name"])
        {
            echo "Song Already exist";
            //sleep(5);
           header('Location: http://localhost/assignment-4/addSong.php');
        }
    }
}
$target_dir = "song_photos/";
$target_dir_audio = "song_audio/";
$target_file = $target_dir . basename($_FILES["song_photo"]["name"]);
$target_file_audio = $target_dir_audio . basename($_FILES["song_audio"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$audioFileType = strtolower(pathinfo($target_file_audio,PATHINFO_EXTENSION));
$target_file = $target_dir . "photo-".time().".".$imageFileType;
$target_file_audio = $target_dir_audio . "audio-".time().".".$audioFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["song_photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
       header('Location: http://localhost/assignment-4/addSong.php');
    }
}
// Check if file already exists
if (file_exists($target_file) || file_exists($target_file_audio)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
   header('Location: http://localhost/assignment-4/addSong.php');
}
// Check file size
if ($_FILES["song_photo"]["size"] > 5000000000 || $_FILES["song_audio"]["size"] > 1000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    header('Location: http://localhost/assignment-4/addSong.php');
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $audioFileType != "mp3" && $audioFileType != "mp4" && $audioFileType != "wav") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    header('Location: http://localhost/assignment-4/addSong.php');
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["song_photo"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["song_audio"]["tmp_name"], $target_file_audio)) {
        echo "The file ". basename( $_FILES["song_photo"]["name"]). " has been uploaded.";
        echo "The file ". basename( $_FILES["song_audio"]["name"]). " has been uploaded.";
        $sql="INSERT INTO songs (songName,songPhoto,songAudio,albumName) VALUES ('" . $_POST["song_name"] . "','" . $target_file . "','" . $target_file_audio . "','" . $_POST["album"]  . "')";
        mysqli_query($conn,$sql);
        $current_id = mysqli_insert_id($conn);
        if(!empty($current_id)) {
            echo "New album Added Successfully";
            //sleep(5);
            header('Location: http://localhost/assignment-4/loggedIn.php');
        }
        else
        {
            echo "album NOT Added Successfully";
            header('Location: http://localhost/assignment-4/addSong.php');
            //sleep(5);
        }
        //sleep(5);
    } else {
        echo "Sorry, there was an error uploading your file.";
        header('Location: http://localhost/assignment-4/addSong.php');
    }
}
?>