<?php
$check=true;
if(count($_POST)>0) {
    $validateEmail="/^[a-zA-Z0-9]+@[a-z]+.[a-z]+$/";
    $validatePassword="/[a-zA-Z0-9]{6,}/";
    if(!preg_match($validateEmail, $_POST["EMail"])){
        $check=false;?>
        <script>window.alert("Please Enter Valid Email");</script>
        <?php
        //echo "<h4>Please Enter Valid Email</h4>";
        //sleep(5);
        //header('Location: http://localhost/assignment-4/createAccount.php');
    }
    if(!preg_match($validatePassword,$_POST["password"])){
        $check=false; ?>
        <script>window.alert("Please enter password of minimum 6 length without any whitespace.");</script>
        <?php

        //echo "<h4>Please enter password of minimum 6 length without any whitespace.</h4>";
        //sleep(5);
        //header('Location: http://localhost/assignment-4/createAccount.php');
    }
    if($check==true)
    {
        require_once("db.php");
        $sql = "INSERT INTO users (userName, password, firstName, lastName,email) VALUES ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["firstName"] . "','" . $_POST["lastName"] . "','" . $_POST["EMail"] . "')";
        mysqli_query($conn,$sql);
        $current_id = mysqli_insert_id($conn);
        if(!empty($current_id)) {
            echo "New User Added Successfully";
            //sleep(5);
        }
        else
        {
            echo "User NOT Added Successfully";
            //sleep(5);
        }
    }

}
?>
<!DOCTYPE html>
<html>

<head>
<title>Create-Account</title>
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
                        <input type="text" value="search" class="buttonStyle color3 border" >
                    </div>
                </form>
            </div>
            <div class="ml-auto col-2 ">
                <form name="RegForm1" action="index.php">
                    <div class="form-group col-12">
                        <button type="submit" name="SignIn" class="btn buttonStyle color3 color1">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="ml-auto col-2 ">
                <form name="RegForm2" action="createAccount.php">
                    <div class="form-group col-12 ">
                        <button type="submit" name="createAcc" class="btn buttonStyle color5 color4">Create Account</button>
                    </div>
                </form>    
            </div>
    </div>
</header>

<div class="container" >
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">
            <form name="frmUser" method="post" action="index.php" onsubmit="return formvalidateform1()">
                <div style="width:500px;">
                    <div>
                            <h1>Sign-UP</h1>
                        <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                            <tr>
                                <td><input type="text" size="65" name="userName" class="txtField" value="User Name"></td>
                            </tr>
                            <tr>
                                <td><input type="password" size="65" name="password" class="txtField" value="PASSWORD"></td>
                            </tr>
                            <tr>
                                <td><input type="text" size="65" name="firstName" class="txtField" value="First Name"></td>
                            </tr>
                            <tr>
                                <td><input type="text" size="65" name="lastName" class="txtField" value="Last Name"></td>
                            </tr>
                            <tr>
                                <td><input type="text" size="65" name="EMail" class="txtField" value="E-mail"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit btn buttonStyle color3 color1 border"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>