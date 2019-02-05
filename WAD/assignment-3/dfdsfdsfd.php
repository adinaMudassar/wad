<?php
session_start();
if(isset($_SESSION['userinfo']) && !empty($_SESSION['userinfo']) ){

    echo 'you are logged in';
    echo $_SESSION['userinfo']['userName'];
}