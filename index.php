<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('core/Autobus.php');

if (!empty($_POST['action'])) {
  $passangers = new Autobus();
  $return_value = implode($passangers->getAutobus(), ',');
  echo $return_value;
  exit();
}
else {
  session_unset();
}

require_once('views/index.php');
