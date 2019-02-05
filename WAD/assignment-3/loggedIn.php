<?php
require_once("db.php");
$login=false;
session_start();
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
            header('Location: http://localhost/assignment-3/index.php');

        }
        //echo '<pre>'; print_r($result); echo '</pre>';
        //$row = mysqli_fetch_array($result);
        // echo '<pre>'; print_r($row); echo '</pre>';
        //$message = "User is logged in";
    } else {

        $login = false;
    }
}
//echo $message;
//print_r($_SESSION['userinfo']);
//die();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Log-In</title>
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
                <h5 class="color3">Home</h5>
            </div>
            <div class="col-1 border">
                <h5 class="color3">Stream</h5>
            </div>
            <div class="col-1 border">
                <h6 class="color3">Collection</h6>
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
    <?php if($login==true){?>
    <div class="row">
        <h2>Welcome <?php echo $_SESSION['userinfo']['userName']; ?></h2>
    </div>
    <?php }else{?>
    <div class="row">
        <h2>You are NOT logged In  </h2>
    </div>
    <?php }?>
</div>



</body>

</html>
