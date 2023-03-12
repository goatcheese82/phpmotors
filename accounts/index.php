<?php

// ACCOUNTS CONTROLLER

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/accounts-model.php';
require_once '../library/functions.php';
// require_once 'view/home.php';

session_start();

// Get the array of classifications
$classifications = getClassifications();
// var_dump($classifications);
// exit;

$navList = buildNav($classifications);

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


      //Check for existing Email
      $existingEmail = checkExistingEmail($clientEmail);

      // Check for existing email address in the table
      if ($existingEmail) {
         $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
         include '../view/login.php';
         exit;
      }

      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/register.php';
         exit;
      }


      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);


      $res = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

      if ($res === 1) {
         setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
         $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
         header('Location: /phpmotors/accounts/?action=login');
         exit;
      } else {
         $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
         include '../view/registration.php';
         exit;
      }
      break;
   case 'login':
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientEmail = checkEmail($clientEmail);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $passwordCheck = checkPassword($clientPassword);

      // Run basic checks, return if errors
      if (empty($clientEmail) || empty($passwordCheck)) {
         $message = '<p class="notice">Please provide a valid email address and password.</p>';
         include '../view/login.php';
         exit;
      }

      // A valid password exists, proceed with the login process
      // Query the client data based on the email address
      $clientData = getClient($clientEmail);
      // Compare the password just submitted against
      // the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
      // If the hashes don't match create an error
      // and return to the login view
      if (!$hashCheck) {
         $message = '<p class="notice">Please check your password and try again.</p>';
         include '../view/login.php';
         exit;
      }
      // A valid user exists, log them in
      $_SESSION['loggedin'] = TRUE;
      // Remove the password from the array
      // the array_pop function removes the last
      // element from an array
      array_pop($clientData);
      // Store the array into the session
      $_SESSION['clientData'] = $clientData;
      // Send them to the admin view
      include '../view/admin.php';
      exit;
   case 'admin':
      include '../view/admin.php';
      exit;
   case 'logout':
      session_unset();
      session_destroy();
      include '../view/admin.php';
   default:
      include '../view/login.php';
      break;
}
