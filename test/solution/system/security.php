<?php


class Security {

  // I don't know why it is neccessary this class :( In my approach I put it every time in the login validation...
  public static function checkPass($given, $stored) {
    return password_verify($given,  $stored);
  }

  //used only for production
  private static function hashThatRaw() {
    $users = userModel::getUsers();

    $user_hashed = [];
    foreach ($users as $user => $pass) {
      array_push($user_hashed, implode(Array($user, password_hash($pass, PASSWORD_DEFAULT)), "\t"));
    }
    $file_content = implode($user_hashed, "\n");

    var_dump($file_content);
    file_put_contents('database\\user_hashed.txt', $file_content);
  }


}

?>