<?php

  class PageView {
    // this creates the beginning of HTML page, later can be added more parameters or other stuffs here
    public static function showHTMLBegin (){

      $html =
      '<!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>';

      if (User::hasLoggedUser()) {
        $html .= "Íme a tartalom!";
      } else {
        $html .= "Jelentkezzen be!";
      }

      $html .=
          '</title>
          <link rel="stylesheet" href="styles/style.min.css">
        </head>
        <body>';
        return $html;
    }

    public static function showHTMLEnd (){

      $html =
        '</body>
      </html>';
      return $html;
    }
  }

?>