<?php

class userModel {

  // getting the user database in array in following structure ["username" => "password"]
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

}

?>