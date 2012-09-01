<?php
ini_set('display_errors', 'On');
$db = "w4111b.cs.columbia.edu:1521/adb";
$conn = oci_connect("sr2962", "JeeJgFfu", $db);
$s = oci_parse($conn, 'select * from users');
oci_execute($s);
echo '<pre>';
while ( $row = oci_fetch_assoc($s) ) {
  print_r($row);
}
echo '</pre>';
oci_close($conn);


/*
while ($res = oci_fetch_row($s))
{	
$flag=1;
echo"<label class=\"radio\">";
echo "<tr><td><input type=\"radio\" name='band' value =". $res[1]." /> ". $res[0] ."</td><td>".$res[2]." </td></tr>";
}
$stmt = oci_parse($conn, "select * from users");
oci_execute($stmt, OCI_DEFAULT);

while($row = oci_fetch_row($stmt))
  {
  echo $row['user_id'] . " " . $row['password'];
  echo "<br />";
  }
  
<?php

$c = oci_pconnect("phphol", "welcome", "//localhost/orcl");
$s = oci_parse($c, 'select * from employees');
oci_execute($s);
oci_fetch_all($s, $res);
echo "<pre>\n";
var_dump($res);
echo "</pre>\n";

?>
  
while ($res = oci_fetch_row($stmt))
{
echo "User Name: ". $res[0] ;
}
<?php
$con = mysql_connect("localhost","peter","abc123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

if (mysql_query("CREATE DATABASE my_db",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_close($con);
?>
*/
?>
