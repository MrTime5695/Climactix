<?php
// August 21 - 2020
// Zack Mitchell
// Going off example  https://www.w3schools.com/php/php_mysql_select.asp
//

$servername = "localhost";
$username   = "1145500";
$password   = "PimvfubRE3pKvuS";
$dbname     = "1145500";
$Table      = "TableTwo";

function GetCheck($p)  {

  if ($p == "true")

    return("checked");
  return("");
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$cleaned = preg_replace("/[^A-Za-z0-9 ]/", '', $_GET["id"]);//input cleansing
$cleaned = preg_replace("/[^[:alnum:][:space:]]/u", '', $cleaned);


//change to Unit maybe!
$sql = "SELECT * FROM " . $Table . " WHERE id = " . $cleaned;
$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<html>
  <head>
    <title>RTU Abstract</title>
  </head>

  <body>

    <form action="post.php" method="post">

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <table SweetnessFactor="High">

        <tr> <td>Service Index   </td> <td><input type="text"     name="ccc"    value="<?php echo $row['ccc']; ?>">      </td> </tr>
        <tr> <td>Buisness name   </td> <td><input type="text"     name="bname"  value="<?php echo $row['bname']; ?>">    </td> </tr>
        <tr> <td>Suite Number    </td> <td><input type="text"     name="unit"   value="<?php echo $row['unit']; ?>">     </td> </tr>
        <tr> <td>Phase           </td> <td><input type="text"     name="phase"  value="<?php echo $row['phase']; ?>">    </td> </tr>
        <tr> <td>Voltage         </td> <td><input type="text"     name="volt"   value="<?php echo $row['volt']; ?>">     </td> </tr>
        <tr> <td>Circuit Current </td> <td><input type="text"     name="curr"   value="<?php echo $row['curr']; ?>">     </td> </tr>
        <tr> <td>Panel of origin </td> <td><input type="text"     name="panel"  value="<?php echo $row['panel']; ?>">    </td> </tr>
        <tr> <td>Circuit number  </td> <td><input type="text"     name="cnum"   value="<?php echo $row['cnum']; ?>">     </td> </tr>
        <tr> <td>Gas             </td> <td><input type="checkbox" name="gas"    value="true" <?php print(GetCheck($row['gas'])) ?> ></td> </tr>
        <tr> <td>BTU             </td> <td><input type="text"     name="btu"    value="<?php echo $row['btu']; ?>">      </td> </tr>
        <tr> <td>Electric heat   </td> <td><input type="checkbox" name="eheat"  value="true" <?php print(GetCheck($row['eheat'])) ?> ></td> </tr>
        <tr> <td>KW              </td> <td><input type="text"     name="kw"     value="<?php echo $row['kw']; ?>">       </td> </tr>
        <tr> <td>Pressent Brand  </td> <td><input type="text"     name="pb"     value="<?php echo $row['pb']; ?>">       </td> </tr>
        <tr> <td>Model#          </td> <td><input type="text"     name="model"  value="<?php echo $row['model']; ?>">    </td> </tr>
        <tr> <td>Serial          </td> <td><input type="text"     name="ser"    value="<?php echo $row['ser']; ?>">      </td> </tr>
        <tr> <td>Prot. Instaled? </td> <td><input type="checkbox" name="pp"     value="true" <?php print(GetCheck($row['pp'])) ?> ></td> </tr>
        <tr> <td>Thermostat      </td> <td><textarea              name="t"     rows="8" cols="40"><?php echo $row['t']; ?></textarea></td></tr>
        <tr> <td>Notes:          </td> <td><textarea              name="notes" rows="8" cols="40"><?php echo $row['notes']; ?></textarea></td> </tr>
        <tr> <td>Date Installed  </td> <td><input type="text"     id="Date" name="date"  value="<?php echo $row['date']; ?>">    </td> </tr>
        <tr> <td>Mark for<br>replacment?</td> <td><input type="checkbox"  name="mfr" value="true" <?php print(GetCheck($row['mfr'])) ?> ></td> </tr>

      </table>

      <br>
      <input type="submit" value="Submit Changes"><br><br>

    </form>

    
  </body>
</html>
