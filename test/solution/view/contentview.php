<?php

  class contentView {

    public static function showContent() {
      if (Request::post('logoutSent')) {
        User::setUserLoggedOut();
      }

      $html =
      '<div class="container">
        <section class="content">
          <h1>Lottószámok:</h1>
            <ul class="lotery-numbers">';

      foreach ($_SESSION['lotteryNumbers'] as $num) {
        $html .=
              '<li class="lotery-number">'
                .$num.
              '</li>';
        }
      $html .=
      '</ul>
      <form method="post" action="#">';

      $html .= WebElements::submitButton('Kilépés', 'logoutSent');

      $html .=
          '</form>
        </section>
      </div>';

      return $html;
    }
  }

?>