<?php
// top.phpからデータの受け取り
$name = $_POST["name"];
$adress = $_POST["adress"];
$tel = $_POST["tel"];
$email = $_POST["email"];
//区切る用
$c = ",";
$br = "\n";

$str = $name.$c.$adress.$c.$tel.$c.$email;
$file = fopen("data.txt", "a");
fwrite($file, $str."\n");
fclose($file);

header("Location:http://localhost/rand_data/output.php")
?>