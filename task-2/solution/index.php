<?php
  /*
    * set the timezone
    * the init loads the external classses
    * starts the session and
    * checks the submit ID
  */
  require 'system/initialize.php';

  // handling the login and logout and generating user messages
  $message = User::handleLogoutAndLogout();

  // header + open html body tag
  $pageStart = PageView::showHTMLBegin();

  // this is the only one decision in the application therefore I leave it here
  $page = '';
  if (User::hasLoggedUser()) {
    $page .= ContentContorller::createContent($message);
  } else {
    $page .= loginView::showLoginForm($message);
  }

  // header + open html body tag
  $pageEnd = PageView::showHTMLEnd();

  // spread the words out
  echo $pageStart.$page.$pageEnd;

?>