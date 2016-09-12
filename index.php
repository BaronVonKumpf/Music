<?php
  require_once('./inc/connection.php');
  require_once('./inc/includes.php');
  require_once('./inc/global_func.php');
  
  
    if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'home';
    $action     = 'home';
  }

  require_once('views/layout.php');
?>

