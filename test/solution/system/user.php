<?php
  class User
  {

    public static function hasLoggedUser() {
      return isset($_SESSION['user']);
    }

    public static function setUserLoggedIn() {
      $_SESSION["user"] = true;
    }

    public static function setUserLoggedOut() {
      unset($_SESSION["user"]);
    }

  }
?>