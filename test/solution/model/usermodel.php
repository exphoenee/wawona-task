<?php

class userModel {

  public function getUsers() {
    $file_content = file_get_contents('database\\user.txt');

    $lines = preg_split('/\r\n|\r|\n/', $file_content);

    $users = [];
    foreach ($lines as $line) {
      List($user, $pass) = preg_split('/\s+/', $line);
      $users[$user] = $pass;
    }

    return $users;
  }

  public function getUser($userData) {
    $loginOk = null;

    $users = self::getUsers();

    if (isset($users[$userData['username']])) {
      $loginOk = $users[$userData['username']] == $userData['password'];
      User::setUserLoggedIn();
      var_dump(User::hasLoggedUser());
    }

    return $loginOk;
  }

}

?>