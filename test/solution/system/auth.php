<?php

  class Auth {

    public static function loginUser ($userData) {
      $message = 'Valami baj történt...';

      $user = $userData['username'];
      $pass = $userData['password'];

      return $message;
    }

  }

?>