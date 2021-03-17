<?php

class WebElements {

  // generating submitId html element of submit button for submit validation
  public static function submitId($submitId) {
    return '<input
    type="hidden"
    name="submitId"
    value="'.$submitId.'"
    >';
  }

  // createing html element of a button
  public static function button($text, $name, $class = null) {
    $html = '
            <button
              type="submit"
              name="'.$name.'"
              value="1"';

    if ($class) {
      $html .= 'class="'.$class.'"';
    }

    $html .=
              '>
              '.$text.'
            </button>';
    return $html;
  }

  // createing html element of a submit button (button + submitId)
  public static function submitButton($text, $name, $class = null) {
    $html = self::submitId(rand());
    $html .= self::button($text, $name, $class);
    return $html;
  }
}

?>