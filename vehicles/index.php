<?php
//VEHICLES CONTROLLER

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/vehicle-model.php';
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
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// // Build the select list
// $classificationList = '<select name="classificationId" id="classificationId">';
// foreach ($classifications as $classification) {
//    $classificationList .= "<option value='$classification[classificationId]' name='$classification[classificationId]'>$classification[classificationName]</option>";

// }
// $classificationList .= "</select>";

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
   case 'addClassification':
      include '../view/add-classification.php';
      break;
   case 'addVehicle':
      include '../view/add-vehicle.php';
      break;
   case 'createClassification':
      $classificationName = filter_input(INPUT_POST, 'classificationName');

      if (empty($classificationName)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/add-classification.php';
         exit;
      }

      $res = createClassification($classificationName);
      
      if ($res === 1) {
         header('Location: /phpmotors/vehicles/');
         exit;
      } else {
         $message = "<p>Sorry, the classification was not added to the database.</p>";
      }
      break;
   case 'createVehicle':
      $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
      $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
      $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
      $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

      if (empty($classificationId) || empty($invMake)/opt/lampp/htdocs/phpmotors/accounts || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/add-vehicle.php';
         exit;
      }

      $res = createVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
      
      if ($res === 1) {
         $message = "Your vehicle was added to the inventory!";
         include '../view/add-vehicle.php';
         exit;
      } else {
         $message = "<p>Sorry, the vehicle was not added to the database.</p>";
      }
      break;
   default:
      include '../view/vehicle-man.php';
      break;
}

?>