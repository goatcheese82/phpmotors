<?php

// ACCOUNTS CONTROLLER

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/accounts-model.php';
require_once '../library/functions.php';
// require_once 'view/home.php';

// Get the array of classifications
$classifications = getClassifications();
// var_dump($classifications);
// exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
   $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {
   case 'signup':
      include '../view/register.php';
      break;
   case 'register':
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);


      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/register.php';
         exit;
      }


      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
      $res = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

      if ($res === 1) {
         $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
         include '../view/login.php';
         exit;
      } else {
         $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
         include '../view/registration.php';
         exit;
      }
      break;
   default:
      include '../view/login.php';
      break;
}

?>