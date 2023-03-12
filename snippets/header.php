<?php $url = array("login" => "login", "signup" => "signup", "admin" => "admin", "logout" => "logout",)
?>
<header>
   <img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo" />
   <div>
      <?php if (isset($_SESSION['clientData'])) {
         echo "<a href='/phpmotors/accounts/index.php?action=" . urlencode($url['admin']) . "' title='Welcome'>Welcome {$_SESSION['clientData']['clientFirstname']}</a>";
      } ?>
      <?php
      ?>
      <?php
         if (isset($_SESSION['loggedin'])) {
            echo "<a href='/phpmotors/accounts/index.php?action=" . urlencode($url['logout']) . "' title='Lougout'>Logout</a>";
         }
         else {
            echo "<a href='/phpmotors/accounts/index.php?action=" . urlencode($url['login']) . "' title='My Account'>My Account</a>";
         }
      ?>
   </div>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>
</header>