<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>


  <?php
    require_once 'points.php';

    echo '<h1>It works</h1>';

    $pointsStr = file_get_contents('.\\points.csv');
    $lines = preg_split('/\r\n|\r|\n/', $pointsStr);

    $points = [];
    foreach ($lines as $line) {
      $pointInfo = explode(',', $line);
      $pointArray = Array( "latitude" => $pointInfo[0], "longitude" => $pointInfo[1], "time" => $pointInfo[2]);

      array_push($points, $pointArray);
    }

  ?>
</body>

</html>