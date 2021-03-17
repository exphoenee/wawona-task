<?php

class ContentContorller {

  // handling the lottery numbers and create the content view
  public static function createContent($message) {
    Lottery::createLottery();
    return contentView::showContent($message);
  }

}

?>