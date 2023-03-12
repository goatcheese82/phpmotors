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
      <?php
      if (isset($message)) {
         echo $message;
      }
      ?>
      <form action="/phpmotors/accounts/index.php" method="post">
         <label for="clientFirstname">First Name:</label>
         <input type="text" name="clientFirstname" id="clientFirstname" <?php if (isset($clientFirstname)) {
                                                                           echo "value='$clientFirstname'";
                                                                        } ?> required><br>
         <label for="clientLastname">Last Name:</label>
         <input type="text" name="clientLastname" id="clientLastname" <?php if (isset($clientLastname)) {
                                                                           echo "value='$clientLastname'";
                                                                        } ?> required><br>
         <label for="clientEmail">E-mail:</label>
         <input type="email" name="clientEmail" id="clientEmail" <?php if (isset($clientEmail)) {
                                                                           echo "value='$clientEmail'";
                                                                        } ?> required><br>
         <label for="clientPassword">Password:</label><br>
         <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
         <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
         <input type="submit" name="submit" id="regbtn" value="Register">
         <input type="hidden" name="action" value="register">
      </form>
   </main>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</body>

</html>