<?php

  class LoginController {

    public static function validateLogin($userData) {
      $message = 'Valami hiba történt...';
      if (userModel::getUser($userData)) {
        $message = 'Sikeres bejelentkezés!';
      } else {
        $message = 'Hibás e-mail cím vagy jelszó!';
      }

      return $message;
    }

    public static function createLogin  () {
      $message = null;

      if (Request::post('loginSent')) {
        $postdata = Request::post();
        $message = self::validateLogin($postdata);
      }

      return loginView::showLoginForm($message);
    }
  }
?>