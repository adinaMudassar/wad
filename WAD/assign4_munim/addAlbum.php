<?php
require_once("db.php");
$login=false;
session_start();
if(isset($_SESSION['userinfo']) && !empty($_SESSION['userinfo']) ){
    $login=true;

}
else {
    header('Location: http://localhost/assignment-4/index.php');
}
//echo $message;
//print_r($_SESSION['userinfo']);
//die();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Album</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="bootStrap.css" />
    <script src="main.js"></script>
</head>

<body>

<header>
        <div class="row color2">
            <div class="col-2 color1">
                <h4 class="color3">Sound Cloud</h4>
            </div>
            <div class="col-1 border">
                <a href="loggedIn.php"> <h5 class="color3">Home</h5></a>
            </div>
            <div class="col-1 border">
                <a href="addAlbum.php"> <h5 class="color3">Add Album</h5></a>
            </div>
            <div class="col-1 border">
                <a href="addSong.php"><h4 class="color3">Add Song</h4></a>
            </div>
            <div class="col-3 border">
                <form name="bar" >
                    <div class="form-group col-12 ">
                        <input type="text" value="search" class="buttonStyle color3 border"  >
                    </div>
                </form>
            </div>
            <div class="ml-auto col-2 ">
                <form name="RegForm1" action="index.php">
                    <div class="form-group col-12">
                        <button type="submit" name="SignIn" class="btn buttonStyle color5 color4"><?php if($login){echo $_SESSION['userinfo']['userName'];}else{echo "No user";}?></button>
                    </div>
                </form>
            </div>
            <div class="ml-auto col-2 ">
                <form name="RegForm2" action="logout.php">
                    <div class="form-group col-12 ">
                        <button type="submit" name="logout" class="btn buttonStyle color3 color1 ">Log out!</button>
                    </div>
                </form>
            </div>
        </div>
</header>

<div class="container">
    <?php if($login==true){?>

        <div class="row">
            <div class="col-12 color6">
                <form action="uploadAlbum.php" method="post" enctype="multipart/form-data">
                    <label for="album_name">Album Name</label>
                    <input type="text" id="album_name" name="album_name" placeholder="album name.." class="text">

                    <label for="lname">Album Photo</label>
                    <input type="file" id="album_photo" name="album_photo" placeholder="album Photo">

                    <input type="submit" value="Submit" class="submit">
                </form>
            </div>
        </div>

    <?php }else{?>
        <div class="row">
            <h2>You are NOT logged In  </h2>
        </div>
    <?php }?>
</div>



</body>

</html>
