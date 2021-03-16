<?php

class WebElements {

  public static function submitButton($text, $name) {
    return '<input type="hidden" name="submitId" value="'.rand().'">
    <button type="submit" name="'.$name.'" value="1">'.$text.'</button>';
  }
}

?>