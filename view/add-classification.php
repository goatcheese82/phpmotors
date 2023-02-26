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
   $title = "Vehicle Management";
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
      <form action="/phpmotors/vehicles/index.php" method="post">
         <label for="classificationName">Classification Name:</label><br>
         <span>Classifications can be no longer than 30 characters.</span>
         <input type="text" name="classificationName" id="classificationName" maxlength="30"><br>
         <input type="submit" name="submit" id="classbtn" value="Add Classification">
         <input type="hidden" name="action" value="createClassification">
      </form>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>