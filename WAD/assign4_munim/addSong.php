<?php
require_once("db.php");
$login=false;
$album=false;
session_start();
$album_query="SELECT * FROM album ";
$album_result=mysqli_query($conn, $album_query);
if($album_result->num_rows>0)
{
    $album=true;
}
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
    <title>Add song</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="bootStrap.css" />
    <script src="main.js"></script>
</head>

<body>

<header>
    <div class="container" >
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
    </div>
</header>

<div class="container">
    <?php if($login==true){
        if($album==true){?>
    <div class="row">
        <div class="col-12 color6">
            <form action="uploadSongs.php" method="post" enctype="multipart/form-data">
                <label for="song_name">Song Name</label>
                <input type="text" id="song_name" name="song_name" placeholder="Song name..">

                <label for="lname">Song Photo</label>
                <input type="file" id="song_photo" name="song_photo" placeholder="Song Photo">

                <label for="lname">Song Audio</label>
                <input type="file" id="song_audio" name="song_audio" placeholder="Song Audio">

                <label for="album">Albums</label>
                <select id="album" name="album">
                    <?php
                        $i=0;
                        while($arow=mysqli_fetch_array($album_result)) {
                            ?>
                            <option value="<?php echo $arow["albumName"];?>"><?php echo $arow["albumName"];?></option>
                            <?php
                            $i = $i + 1;
                        }
                    ?>
                </select>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <?php }else{?>
            <div class="row">
                <h2>You don't have any album. </h2>
            </div>
        <?php }
    }else{?>
        <div class="row">
            <h2>You are NOT logged In!  </h2>
        </div>
    <?php }?>
</div>



</body>

</html>
