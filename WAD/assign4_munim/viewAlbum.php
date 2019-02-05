<?php
require_once("db.php");
$login=false;
$songs=false;

session_start();

if(isset($_SESSION['userinfo']) && !empty($_SESSION['userinfo']) ){
    $login=true;
}
else {
    header('Location: http://localhost/assignment-4/index.php');
}
$song_query="SELECT * FROM songs where albumName='" . $_GET["albumName"]  . "'";
$song_result=mysqli_query($conn, $song_query);
if($song_result->num_rows>0)
{
    $songs=true;
}
?>
<html>

<head>
    <title>Songs</title>
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
                <a href="loggedIn.php"><h4 class="color3">Home</h4></a>
            </div>
            <div class="col-1 border">
                <a href="addAlbum.php"><h4 class="color3">Add Album</h4></a>
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
    <?php if($login==true){
        if($songs==true){?>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"><h2>ALBUMS SONGS</h2></div>
                <div class="col-4"></div>
            </div>
            <div class="row">
                <!---<div class="col-12 color6">--->
                <?php
                while($arow=mysqli_fetch_array($song_result)){
                    ?>
                    <div class="col-3">
                        <img src="<?php echo $arow["songPhoto"]; ?>" style="width:100%; height: 200px;">
                        <audio controls>
                            <source src="<?php echo $arow["songAudio"]; ?>" type="audio/mp3">
                            Your browser does not support the audio tag.
                        </audio>
                        <h2><?php echo $arow["songName"]; ?></h2>
                    </div>
                <?php } ?>
                <!---</div>--->
            </div>

    <?php}else{ ?>
    <div class="row">
        <br>
        <h2>Press "Add songs" to add songs in album</h2>
    </div>
        <?php }}else{?>
        <h2>You are not logged in!</h2>
    <?php }?>
</div>



</body>

</html>
