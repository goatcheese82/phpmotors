<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../css/main.css" />
   <title>PHP Motors</title>
   <?php
   $title = "Content goes here";
   ?>
</head>

<body>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/title.php'; ?>
   <main>
      <form action="welcome.php" method="post">
         Firts Name: <input type="text" name="clientFirstname" id="clientFirstname"><br>
         Last Name: <input type="text" name="clientLastname" id="clientLastname"><br>
         E-mail: <input type="text" name="clientEmail" id="clientEmail"><br>
         Password: <input type="text" name="clientPassword" id="clientPassword"><br>
         <input type="submit">
      </form>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>