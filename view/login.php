<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../css/main.css" />
   <link rel="stylesheet" type="text/css" href="../css/login.css" />
   <title>PHP Motors</title>
   <?php
   $title = "Login";
   $url = array("login" => "login", "signup" => "signup");
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
      <form action="welcome.php" method="post">
         E-mail: <input type="email" name="clientEmail" id="clientEmail" required="true"><br>
         Password: <input type="text" name="clientPassword" id="clientPassword"><br>
         <input type="submit">
      </form>
      <?php
      echo "<a href='/phpmotors/accounts/index.php?action=" . urlencode(($url)['signup']) . "' title='Create a new account'>Don't have an account</a>";
      ?>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>