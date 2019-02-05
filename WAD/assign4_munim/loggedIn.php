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
    if ($_POST['EMail'] != "" && $_POST['password'] != "") {
        $select_query = "SELECT * FROM users WHERE email='" . $_POST["EMail"] . "' and password='" . $_POST["password"] . "'";
        $result = mysqli_query($conn, $select_query);
        if ($result->num_rows > 0) {

            $login = true;
            $row = mysqli_fetch_array($result);
            $_SESSION['userinfo'] = $row;
        } else {
            $message = "User not found";
            header('Location: http://localhost/assignment-4/index.php');

        }
        //echo '<pre>'; print_r($result); echo '</pre>';
        //$row = mysqli_fetch_array($result);
        // echo '<pre>'; print_r($row); echo '</pre>';
        //$message = "User is logged in";
    } else {

        $login = false;
        header('Location: http://localhost/assignment-4/index.php');
    }
}
//echo $message;
//print_r($_SESSION['userinfo']);
//die();
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php if($login){echo $_SESSION['userinfo']['userName'];}else{echo "No user";}?></title>
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
    <?php if($login==true){?>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><h2>Welcome <?php echo $_SESSION['userinfo']['userName']; ?>!</h2></div>
        <div class="col-4"></div>
    </div>
        <br>
        <?php if($album==true){ ?>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"><h2>YOUR ALBUMS</h2></div>
                <div class="col-4"></div>
            </div>
        <div class="row">
            <!---<div class="col-12 color6">--->
            <?php
            while($arow=mysqli_fetch_array($album_result)){
            ?>
                <div class="col-3">
                <img src="<?php echo $arow["albumPhoto"]; ?>" style="width:100%; height: 200px;">
                <a name = "albumName" href="viewAlbum.php?albumName=<?php echo $arow["albumName"]; ?>"><h3><?php echo $arow["albumName"];?></h3></a>
                </div>
            <?php } ?>
            <!---</div>--->
        </div>
    <?php }else{?>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6"><h2>Press Add Album to add your new album!</h2></div>
                <div class="col-3"></div>
            </div>
    <?php } }else{?>
    <div class="row">
        <h2>You are NOT logged In  </h2>
        header('Location: http://localhost/assignment-4/index.php');
    </div>
    <?php }?>
</div>



</body>

</html>
