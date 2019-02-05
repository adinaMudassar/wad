<?php
require "db_connection.php";
$subject = "https://regexr.com/";
$pattern = '/\b([\w]+\.[\w]+)\b/';
preg_match_all($pattern, $subject, $matches);
print_r($matches);
$tmpArr = array();
$s = implode($matches[0]);

    $insert_match = "insert into matches (p_name) VALUES ('{$s}');";
    $insert_match = mysqli_query($con, $insert_match);