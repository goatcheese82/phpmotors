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
      if (isset($_SESSION['message'])) {
         echo $_SESSION['message'];
      }
      ?>
      <form action="/phpmotors/accounts/index.php" method="post">
         E-mail: <input type="email" name="clientEmail" id="clientEmail" required="true" <?php if (isset($clientFirstname)) {
                                                                                             echo "value='$clientFirstname'";
                                                                                          } ?> required><br>
         Password: <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
         <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
         <input type="submit">
         <input type="hidden" name="action" value="login">
      </form>
      <?php
      echo "<a href='/phpmotors/accounts/index.php?action=" . urlencode(($url)['signup']) . "' title='Create a new account'>Don't have an account</a>";
      ?>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>