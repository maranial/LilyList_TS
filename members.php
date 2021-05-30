<?php 
  require_once 'header.php';

  if (!$loggedin) die("</div></body></html>");

  if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);
    
    if ($view == $user) $name = "$user's";
    else                $name = "$view's";
    
    echo "<h3>$name Profile</h3>";
    showProfile($view);
    echo "<a data-role='button' data-transition='slide'
          href='lists.php?view=$view'>View $name To-Do List</a>";
    die("</div></body></html>");
  }

  
?>
    </ul></div>
  </body>
</html>
