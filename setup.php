<!DOCTYPE html>
<html>
  <head>
    <title>Database Setting</title>
  </head>
  <body>

    <h3>Database Setting</h3>

<?php 
  require_once 'functions.php';

  createTable('members',
              'user VARCHAR(16),
              pass VARCHAR(16),
              INDEX(user(6))');

  createTable('lists', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              pm CHAR(1),
              time INT UNSIGNED,
              listText VARCHAR(1000),
              INDEX(auth(6)),
              INDEX(recip(6))');

  createTable('profiles',
              'user VARCHAR(16),
              text VARCHAR(1000),
              INDEX(user(6))');
?>

    <br>Completed!
  </body>
</html>
