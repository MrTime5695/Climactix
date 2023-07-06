<?php
// August 21 - 2020
// Zack Mitchell
// Going off example  https://www.w3schools.com/php/php_mysql_select.asp
//

$servername = "localhost";
$username   = "www-data";
$password   = "secret";
$dbname     = "CoastTest";
$Table      = "TableTwo";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];

$IndexArray = array("ccc",
                    "bname",
                    "unit",
                    "phase",
                    "volt",
                    "curr",
                    "panel",
                    "gas",
                    "cnum",
                    "btu",
                    "eheat",
                    "kw",
                    "pb",
                    "model",
                    "ser",
                    "pp",
                    "t",
                    "notes",
                    "date",
                    "mfr" );

if ($_POST['gas'] == "")
  $_POST['gas'] = "false";

if ($_POST['eheat'] == "")
  $_POST['eheat'] = "false";

if ($_POST['mfr'] == "")
  $_POST['mfr'] = "false";

if ($_POST['pp'] == "")
  $_POST['pp'] = "false";

foreach  ( $IndexArray as $i )  {

  if ( $_POST[$i] != "" )  {

$_POST[$i] =    preg_replace("/[^A-Za-z0-9 ]/", '', $_POST[$i]);//Doing more input cleansing.
$_POST[$i] =    preg_replace("/[^[:alnum:][:space:]]/u", '', $_POST[$i]);
    $sql = 'UPDATE ' . $Table . ' SET ' . $i . '="' . $_POST[$i] .  '" where id = ' . $_POST["id"];
    mysqli_query($conn, $sql);
  }
}

mysqli_close($conn);
//FIx URL!!
?>
<html>

  <head>

    <title>Changes</title>
    <meta http-equiv="refresh" content="2;URL='http://magic.jumpingcrab.com/'" />
  </head>

  <body>

<?php

  echo "<h1>Changes made</h1><br><br>";
  echo "\n\nRedirecting you back..";
//DEBUG
//  printf("\n\n<br><br>DEbug: %s - %s\n", $_POST['unit'], $id);
//  echo "    " . $sql;

?>

  </body>
</html>
