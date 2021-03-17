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
    require_once 'loaddata.php';

    echo '<h1>It works</h1>';

    $rawPoints = getData();

    $Journey = new Journey();

    foreach ($rawPoints as $rawPoint) {
      $coordinate = new Coordinate($rawPoint['latitude'], $rawPoint['longitude'], $rawPoint['time']);

      $Journey->addCoordinate($coordinate);
    }

    var_dump($Journey->clean());

  ?>
</body>

</html>