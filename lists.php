<?php 
  require_once 'header.php';
  
  if (!$loggedin) die("</div></body></html>");

  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

  if (isset($_POST['text']))
  {
    $text = sanitizeString($_POST['text']);

    if ($text != "")
    {
      $pm   = substr(sanitizeString($_POST['pm']),0,1);
      $time = time();
      queryMysql("INSERT INTO lists VALUES(NULL, '$user',
        '$view', '$pm', $time, '$text')");
    }
  }

  if ($view != "")
  {
    if ($view == $user) $name1 = $name2 = "$user's";
    else
    {
      
      $name1 = "<a href='members.php?view=$view'>$view</a>'s";
      $name2 = "$view's";
    }

    // echo "<h3>$name1 Profile</h3>";
    // showProfile($view);
    
    echo <<<_END

      <br>
      <br>
      <form method='post' action='lists.php?view=$view'>
        <fieldset data-role="controlgroup" data-type="horizontal" >
          <legend><h3>Make your To-Do List here:</h3></legend>
          <br>
          <input type='radio' name='pm' id='general' value='0' checked='checked' >
          <label for="general">General</label>
          <input type='radio' name='pm' id='important' value='1'>
          <label for="important">Important</label>
        </fieldset>
      <textarea name='text'></textarea>
      <input data-transition='slide' type='submit' value='Post Your List'>
    </form><br><br>
_END;
   

    echo "<h3>$name1 To-Do List</h3>";

    date_default_timezone_set('GMT-4');

    if (isset($_GET['erase']))
    {
      $erase = sanitizeString($_GET['erase']);
      queryMysql("DELETE FROM lists WHERE id=$erase AND recip='$user'");
    }
    
    $query  = "SELECT * FROM lists WHERE recip='$view' ORDER BY time DESC";
    $result = queryMysql($query);
    $num    = $result->num_rows;
    

    for ($j = 0 ; $j < $num ; ++$j)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);

      if ($row['pm'] == 0 || $row['auth'] == $user || $row['recip'] == $user)
      {
        
        echo date("d.m.Y ", $row['time']);
        // echo " <a href='lists.php?view=" . $row['auth'] .
        //      "'>" . $row['auth']. "</a> ";

        echo "- ";

        if ($row['pm'] == 0)
          echo "&quot;" . $row['listText'] . "&quot; ";
        else
          echo "<span class='whisper'>&quot;" .
            $row['listText']. "&quot;</span> ";

        echo " at";

        echo date(" H:i:s ", $row['time']);

        

        if ($row['recip'] == $user)
          echo " <a href='lists.php?view=$view" .
               "&erase=" . $row['id'] . "'>Remove</a>";

        echo "<br>";
        
      }
    }
  }

  if (!$num)
    echo "<br><span class='info'>No lists yet</span><br><br>";

  echo "<br><a data-role='button'
        href='lists.php?view=$view'>Update your lists</a>";
?>

    </div><br>
  </body>
</html>


