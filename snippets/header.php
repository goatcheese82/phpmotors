<?php $url = array("login" => "login", "signup" => "signup")
?>
<header>
   <img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo" />
   <div>
      <?php
       echo "<a href='/phpmotors/accounts/index.php?action=" . urlencode($url['login']) . "' title='Login'>My Account</a>";
       ?>
       </div>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>
</header>