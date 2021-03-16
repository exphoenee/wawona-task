<?php

  class loginView {

    public static function showLoginForm($message = null) {
      $html = '';
      $html .=
      '<div class="container">
        <div class="form-container">
          <form action="#" method="post">
            <div class="form-wrapper">
              <h1>Bejelentkezés</h1>
              <div class="input-field">
                <label form="username-page">Felhasználónév</label>
                <input type="username" id="username-page" name="username"></input>
              </div>
              <div class="input-field">
                <label form="password-page">Jelszó</label>
                <input type="password" id="password-page" name="password"></input>
              </div>';
      if ($message) {
        $html .=
              '<p class="error-message">'.$message.'</p>';
      }
      $html .= WebElements::submitButton('Belépés', 'loginSent');
      $html .=
            '</form>
          </div>
        </div>
      </div>';
      return $html;
    }
  }

?>