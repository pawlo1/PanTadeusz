<meta charset="UTF-8"/>
<?php
include "plik.php";
$con = pg_connect("host=sbazy user=s180473 dbname=s180473 password=$h");
$s = "select * from studenci";
$r = pg_exec($con, $s);
$lw = pg_numrows($r);
$lk = pg_numfields($r);

print "<table border=1>";

for ($i=0; $i<$lk; $i++){
print "<th>".pg_field_name($r, $i);
};


for ($j=0; $j<$lw; $j++){
print "<tr>";
  for ($i=0; $i<$lk; $i++){
  print "<td>".pg_result($r, $j, $i);
  };
print "</tr>";
};
print "</table>";
?>