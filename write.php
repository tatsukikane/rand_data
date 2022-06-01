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
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./output.css">
  <title>Document</title>
</head>
<body>
  <div class="text" id = "text">
    <img src="./tankyu.png" id = "img">
  </div>


  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jrumble/1.3.0/jquery.jrumble.min.js"
  integrity="sha512-0vcUK0oQ15FtIrg1bbNL6zO2yB0pSZjPZERBNA0ZXIw/7jsSHu+rxxbpbM20wIaiEofTK9oPoP/Y8xvh3qoasQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $("#img").jrumble({
      x: 0,
      y: 0,
      rotation: 5,
      speed: 50
    });
    $("#img").trigger('startRumble')
  </script>
</body>
</html>