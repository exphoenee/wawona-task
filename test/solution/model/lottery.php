<?php

class Lottery {

  // getting the iterator of lottery number generation is is not set here is set to 1
  private static function getLotteryIteration() {
    if (!isset($_SESSION['lotteryIteration'])) {
      $_SESSION['lotteryIteration'] = 1;
    }

    return $_SESSION['lotteryIteration'];
  }

  // initializing the lottery numbers
  private static function initLotteryNumbers() {
      if (!isset($_SESSION['lotteryNumbers'])) {
      self::generateLotteryNumbers();
    }
  }

  // this function is able to set the iterator of lottery number generation
  private static function setLotteryIteration($value) {
    if (isset($_SESSION['lotteryIteration'])) {
      $_SESSION['lotteryIteration'] = $value;
    } else {
      $_SESSION['lotteryIteration'] = 1;
    }
  }

  // here is incremented the lottery number generatin iterator
  private static function increaseLotteryIteration() {
    self::setLotteryIteration(self::getLotteryIteration()+1);
  }

  // generates the lottery numbers, checks the uniquity of the numbers
  private static function generateLotteryNumbers($numbers = 5) {
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

  // handling the iterations and the number generations
  /*
      1. it was not clear in the description, that the numbers should be every pageloading without login generated.
      2. this solution counts only the page loads, if there is a logged in user present in the session!
  */
  public static function createLottery() {
    self::initLotteryNumbers();
    if (self::getLotteryIteration() >= 5) {
      self::setLotteryIteration(1);
      self::generateLotteryNumbers();
    } else {
      self::increaseLotteryIteration();
    }
  }
}

?>