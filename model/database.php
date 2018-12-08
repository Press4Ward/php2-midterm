<?php
    //$dsn = 'mysql:host=press4wardgroupcom.ipagemysql.com;dbname=php2_midterm';//
    $dsn = 'mysql:host=localhost;dbname=php2_midterm';
    $username = 'root';
    $password = '';
    //$db = 'php2_midterm'; // database name in phpMyAdmin
    $port = 8888;

    // Create database connection for MAMP
    //$conn = mysqli_connect( $dsn, $username, $password, $db);
    $link = mysqli_init();
    $success = mysqli_real_connect($link, $dsn, $username, $password, $port);

  /* Check Database connection
  if ($conn) {
    die("Ops." . mysqli_connect_error() );
  }
    // mgs_user, mgs_admin and root all have same password of Exuma2018
*/
try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
