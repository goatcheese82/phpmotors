<?php
if (!isset($_SESSION['loggedin'])) {
   header('Location: /phpmotors/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../css/main.css" />
   <title>PHP Motors | Admin</title>
   <?php
   $title = "PHP Motors Admin";
   ?>
</head>

<body>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/title.php'; ?>
   <main>
      <h1><?php echo "{$_SESSION['clientData']['clientFirstname']} {$_SESSION['clientData']['clientLastname']}"; ?></h1>
      <ul>
         <?php
         foreach ($_SESSION['clientData'] as $key => $value) {
            echo "<li>{$key}: {$value}</li>";
         }
         ?>
      </ul>
      <?php
      if ($_SESSION['clientData']['clientLevel'] >= 1) {
         echo "<p><a href='/phpmotors/vehicles/index.php'>Vehicle Management</a></p>";
      } ?>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>