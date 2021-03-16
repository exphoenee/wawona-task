<?php
  session_start();
  date_default_timezone_set("Europe/Budapest");

  require_once 'system/request.php';
  require_once 'system/auth.php';
  require_once 'system/user.php';
  require_once 'system/lottery.php';

  require_once 'model/usermodel.php';

  require_once 'view/webelements.php';
  require_once 'view/pageview.php';
  require_once 'view/loginview.php';
  require_once 'view/contentview.php';

  require_once 'controller/logincontroller.php';
  require_once 'controller/contentcontroller.php';

  Request::SubmitCheck();

  $pageStart = PageView::showHTMLBegin();

  $page = '';
  if (User::hasLoggedUser()) {
    $page .= ContentContorller::createContent();
  } else {
    $page .= LoginController::createLogin();
  }

  $pageEnd = PageView::showHTMLEnd();

  echo $pageStart.$page.$pageEnd;

?>