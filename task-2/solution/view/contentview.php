<?php

  class contentView {

    // generating the view of the lottery numbers
    public static function showLotteryNumbers() {
      $html =
        '<ul class="lotery-numbers">';

      foreach ($_SESSION['lotteryNumbers'] as $num) {
        $html .=
          '<li class="lotery-number">'
            .$num.
          '</li>';
      }

      $html .=
        '</ul>';
      return $html;
    }

    // generating the view of logout form
    public static function showLogoutForm() {
      $html =
          '<form method="post" action="#">';
      $html .= WebElements::submitButton('Kilépés', 'logoutSent', 'logout-btn');
      $html .=
          '</form>';

      return $html;
    }


    // generating the content view
    public static function showContent($message) {
      $html = '';


      $html .=
      '<div class="container">
      <section class="content">';
      $html .=
      '<h1>Lottószámok:</h1>';

      if ($message) {
        $html .= WebElements::showMessage($message, "user-message");
      }

      $html .= self::showLotteryNumbers();
      $html .= self::showLogoutForm();

      $html .=
        '</section>
      </div>';

      return $html;
    }
  }

?>