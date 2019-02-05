<?php
/**
 * Created by PhpStorm.
 * User: munim
 * Date: 1/27/2019
 * Time: 6:31 PM
 */
session_start();
if(isset($_SESSION['userinfo']) && !empty($_SESSION['userinfo']) ){

    session_unset();
    session_destroy();
    header('Location: http://localhost/assignment-3/index.php');
}
else
{
    echo "User not logged In";
}
?>