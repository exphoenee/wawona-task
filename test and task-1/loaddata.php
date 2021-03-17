<?php

function getData() {
  $pointsStr = file_get_contents('.\\points.csv');
  $lines = preg_split('/\r\n|\r|\n/', $pointsStr);

  $points = [];
  foreach ($lines as $line) {
    $pointInfo = explode(',', $line);
    $pointArray = Array( "latitude" => $pointInfo[0], "longitude" => $pointInfo[1], "time" => $pointInfo[2]);

    array_push($points, $pointArray);
  }

  return $points;
}

?>