<?php 
  $dbhost  = 'localhost';    
  $dbname  = 'maranial_LILYLISTDB';   
  $dbuser  = 'maranial_2019';   
  $dbpass  = 'maraniaL19';   

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die("Error");

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die("Error");
    return $result;
  }

  function destroySession()
  {
    $_SESSION = array(); 

    if (session_id() != "" || isset($_COOKIE[session_name()]))
   //   setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    if (get_magic_quotes_gpc())
      $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }


  function showProfile($user)
  {

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
    else echo "<p>You can add your prompt profile here.</p><br>";
  }
?>
