<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../css/main.css" />
   <link rel="stylesheet" type="text/css" href="../css/form.css" />
   <title>PHP Motors</title>
   <?php
   $title = "Add Vehicle";
   ?>
</head>

<body>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/title.php'; ?>
   <main>
      <?php
      if (isset($message)) {
         echo $message;
      }
      ?>
      <form action="/phpmotors/vehicles/index.php" method="post" id="vehicleForm">
         <label for="classificationId">Classification Name:</label>
         <?php echo $classificationList ?><br>
         <label for="invMake">Make:</label>
         <input type="text" name="invMake" id="invMake"><br>
         <label for="invModel">Model:</label>
         <input type="text" name="invModel" id="invModel"><br>
         <label for="invDescription">Description:</label>
         <textarea name="invDescription" id="invDescription" form="vehicleForm"></textarea><br>
         <label for="invImage">Image Path:</label>
         <input type="text" name="invImage" id="invImage"><br>
         <label for="invThumbnail">Thumbnail Path:</label>
         <input type="text" name="invThumbnail" id="invThumbnail"><br>
         <label for="invPrice">Price:</label>
         <input type="number" name="invPrice" id="invPrice"><br>
         <label for="invStock">Stock:</label>
         <input type="number" name="invStock" id="invStock"><br>
         <label for="invColor">Color:</label>
         <input type="text" name="invColor" id="invColor"><br>
         <input type="submit" name="submit" id="vehiclebtn" value="Add Vehicle">
         <input type="hidden" name="action" value="createVehicle">
      </form>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>