<?php
  class User
  {

    // checking has a logged user in the session
    public static function hasLoggedUser() {
      return isset($_SESSION['user']);
    }

    // set logged user in the session
    public static function setUserLoggedIn() {
      $_SESSION["user"] = true;
    }

    // set user logout in the session
    public static function setUserLoggedOut() {
      unset($_SESSION["user"]);
    }

    // handling the logout action
    private static function handleLogout() {
      if (Request::post('logoutSent')) {
        User::setUserLoggedOut();
        return 'Sikeresen kijelentkezett!<br>Lépjen be újra!';
      }
      return null;
    }

    // handling the login action
    private static function handleLogin() {
      $message = null;

      if (Request::post('loginSent')) {
        $postdata = Request::post();
        $message = LoginController::validateLogin($postdata);
        return $message;
      }
      return null;
    }

    // handling the user action
    public static function handleLogoutAndLogout() {
      $message = self::handleLogout();

      if (!$message) {
        $message = self::handleLogin();
      };
      return $message;
    }

  }
?>