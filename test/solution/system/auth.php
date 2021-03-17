<?php

  class Auth {

  // checking the user is in the database and the user has the same password what is given in the $userData ($userData should be comes from the login form)
  public function loginUser($userData) {
    $loginOk = null;

    $users = userModel::getUsers();

    if (isset($users[$userData['username']])) {
      $loginOk = Security::checkPass($userData['password'], $users[$userData['username']]);
      if ($loginOk) {
        User::setUserLoggedIn();
      }
    }

    return $loginOk;
  }

  }

?>