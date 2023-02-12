<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="/phpmotors/css/main.css" />
   <title>PHP Motors</title>
   <?php
   $title = "Vehicle Management";
   ?>
</head>

<body>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/title.php'; ?>
   <div class="link-container">
   <?php
   echo "<a href='/phpmotors/vehicles/index.php?action=addClassification" . "' title='Add a Classification'>Add Classification</a><br>";
   echo "<a href='/phpmotors/vehicles/index.php?action=addVehicle" . "' title='Add Vehicle'>Add Vehicle</a>";
   ?>
   </div>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>