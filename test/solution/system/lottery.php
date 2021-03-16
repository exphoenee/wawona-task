<?php

class Lottery {

  public static function getLotteryIteration() {
    if (!isset($_SESSION['lotteryIteration'])) {
      $_SESSION['lotteryIteration'] = 1;
    }
    return $_SESSION['lotteryIteration'];
  }

  public static function setLotteryIteration($value) {
    if (isset($_SESSION['lotteryIteration'])) {
      $_SESSION['lotteryIteration'] = $value;
    } else {
      $_SESSION['lotteryIteration'] = 1;
    }
  }

  public static function increaseLotteryIteration() {
    self::setLotteryIteration(self::getLotteryIteration()+1);
  }

  public static function generateLotteryNumbers($numbers = 5) {
    $lotteryNumbers = [];

    for ($i=1; $i<=$numbers; $i++) {
      do {
        $num = rand(1,90);
      } while (in_array($num, $lotteryNumbers));

      array_push($lotteryNumbers, $num);
    }

    asort($lotteryNumbers);

    $_SESSION['lotteryNumbers'] = $lotteryNumbers;
  }

  public static function createLottery() {
    if (self::getLotteryIteration() >= 5) {
      self::setLotteryIteration(1);
      self::generateLotteryNumbers();
    } else {
      self::increaseLotteryIteration();
    }
  }
}

?>