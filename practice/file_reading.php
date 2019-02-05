
<?php
require "db_connection.php";
$fp = @fopen("data.txt", 'r');
$pattern = '/\b(?!.*www)([\w]+\.[\w]+)(?=\/)\b/';

// Add each line to an array
if ($fp) {
    $array = explode("\n", fread($fp, filesize("data.txt")));
    $length = count($array);
    for($i =0 ; $i<$length ; $i++)
    {
        preg_match_all($pattern, $array[$i], $matches, PREG_PATTERN_ORDER);

        $tmpArr = array();
        foreach ($matches as $sub) {
            $tmpArr[] = implode($sub);
        }
        $result = implode( ' ',$tmpArr);
        list($part1, $part2) = explode(' ', $result);
         var_dump($part1);
       // var_dump($part1);
        $insert_match = "insert into matches (p_name) VALUES ('{$part1}');";
        $insert_match = mysqli_query($con, $insert_match);
    }


}
fclose($fp);