<?php

session_start();
$loggedin = false;
if(isset($_SESSION['userinfo']) && !empty($_SESSION['userinfo']) ){

    $loggedin = true;
}
    require_once("db.php");
    $sql = "SELECT * FROM users ORDER BY userId DESC";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
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
                        <button type="submit" name="SignIn" class="btn buttonStyle color5 color4">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="ml-auto col-2 ">
                <form name="RegForm2" action="createAccount.php">
                    <div class="form-group col-12 ">
                        <button type="submit" name="createAcc" class="btn buttonStyle color3 color1 ">Create Account</button>
                    </div>
                </form>    
            </div>
    </div>
</header>

<center>
<div class="container" >
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <?php
            if($loggedin == false) {
                ?>
                <form name="frmUser"  method="post" action="loggedIn.php" onsubmit="formvalidateform2()">
                    <div style="width:500px;">
                        <div><h1>LOG-IN</h1></div>
                        <div class="message"><?php if (isset($message)) {
                                echo $message;
                            } ?></div>
                        <div align="right">
                            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center"
                                   class="tblSaveForm">
                                <tr>
                                <td><input type="text" size="65" name="EMail" class="txtField" value="E-mail"></td>
                                </tr>
                                <tr>
                                    <td><input type="password" size="65" name="password" class="txtField"
                                               value="PASSWORD"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="submit" value="Log-In"
                                                           class="btnSubmit btn buttonStyle color3 color1 border"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                <?php
            }else
            {
                header('Location: http://localhost/assignment-4/loggedIn.php');

            }
            ?>
        </div>
    </div>
</div>
</center>

</body>

</html>