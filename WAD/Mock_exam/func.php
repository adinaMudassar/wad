<?php
require "db_connection.php";

function getBrands(){
    global $con;
    $getBrandsQuery = "select * from matches";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['p_id'];
        $brand_title = $row['p_name'];
        echo "<li><a class='nav-link'>$brand_title</a></li>";
    }
}

function getBs(){
    global $con;
    $getBrandsQuery = "select * from matches";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['p_id'];
        $brand_title = $row['p_name'];
        echo "<li><a class='nav-link'>$brand_id</a></li>";
    }
}

function gets(){
    global $con;
    $getBrandsQuery = "select * from matches";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);

    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['p_id'];
        $More_info = "More info";
        $brand_title = $row['p_name'];
        echo "<li><a class='nav-link'>$More_info</a></li>";
    }
}