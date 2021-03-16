<?php

  class Request {

    public static function get($param) {
      if (isset($_GET[$param])) {
        return $_GET[$param];
      }
      return null;
    }

    public static function post($param = null) {
      if ($param !== null) {
        if (isset($_POST[$param])) {
          return $_POST[$param];
        }
      } else return $_POST;
      return null;
    }

    // this function checks the submitId is set into session, if it is not set, then that is a new form sumbit, if the new submitId is same as in session sotred that form was already sumbitted, it will be thrown away
    public static function SubmitCheck() {
      if (isset($_POST['submitId'])) {
        $id = $_POST['submitId'];

        if (isset($_SESSION['lastSubmitId']) && $_SESSION['lastSubmitId'] == $id) {
          $_POST = [];
        } else {
          $_SESSION['lastSubmitId'] = $id;
        }
      }
    }

  }
?>