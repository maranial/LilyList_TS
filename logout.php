<?php 
  require_once 'header.php';
 
  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<br>
        <br><div class='center'>Thank you for using Lily! Please
         <a data-transition='slide' href='index.php'>click here</a>
         to Homepage.</div>";
  }
  else echo "<br>
        <br><div class='center'>You still have not logged in.</div>";



 echo "</div>
  </body>
  </html>";
 
?>
   
