<?php

  class loginView {

    // creating the login page content
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
      // here is the login message showen
      if ($message) {
        $html .= WebElements::showMessage($message, "error-message");
      }

      // here is the login button added
      $html .= WebElements::submitButton('Belépés', 'loginSent', "login-btn");

      // cloesing the page's opened tags
      $html .=
            '</form>
          </div>
        </div>
      </div>';
      return $html;
    }
  }

?>