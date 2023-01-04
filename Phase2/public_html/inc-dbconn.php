<?php

# These setting are stored in the .htaccess file

$servername = 'cmsc508.com';
$username = 'miloshevsa';
$password = 'Shout4_miloshevsa_GOME';
$dbname = '202310_teams_team02';

/* echo "<br/>Database name: $dbname <br/>Username: $username<br/>"; */

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "<p/>Connection successful.";
} catch(PDOException $e) {
  echo "<p/>Connection failed: " . $e->getMessage();
}
?> 

  