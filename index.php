<?php

// MAIN CONTROLLER
require_once 'library/connections.php';
require_once 'library/functions.php';
require_once 'model/main-model.php';
// require_once 'view/home.php';


session_start();

$navList = buildNav($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
}

// Check for logged in user
if(isset($_COOKIE['firstname'])){
   $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  
switch ($action) {
   case 'template':
      include 'view/template.php';
      break;
   default:
      include 'view/home.php';
      break;
}
