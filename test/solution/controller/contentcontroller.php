<?php

class ContentContorller {

  public static function createContent() {
    Lottery::createLottery();
    return contentView::showContent();
  }

}

?>