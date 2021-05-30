<?php 
  session_start();
  require_once 'header.php';

  echo "<div class='center'>";
  echo "<br><br>";

  if ($loggedin) echo " $user, you are logged in!";
  else           echo " Please log in or sign up.";

  echo <<<_FOOTER

   <br>
   <br>
   <br>

   <div data-role="footer" style='background:#D1F2EB;'>

    <div class='center'>

    <p id="my-name" style='color:#95A5A6;'>&copy; 2021 Mara Suwannawat | Lily's List | For my PHP Final Project </p>
      
    </div>
    </div>
  </body>
</html>
_FOOTER;
?>
