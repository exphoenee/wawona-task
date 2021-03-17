<?php

  class LoginController {

    // validating the login of user
    public static function validateLogin($userData) {
      // this message never will be shown...if i have luck... :)
      $message = 'Valami hiba történt...';

      if (Auth::loginUser($userData)) {
        $message = 'Sikeres bejelentkezés!';
      } else {
        $message = 'Hibás e-mail cím vagy jelszó!';
      }

      return $message;
    }

  }
?>