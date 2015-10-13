<?php
include "plik.php";
$con = pg_connect("host=sbazy user=s180473 dbname=s180473 password=$h");
$lista_studentow="select id_studenta, nazwisko, imie from studenci order by nazwisko";

$r=pg_exec($con,$lista_studentow);
wyswietl_studentow($r);
function wyswietl_studentow($r)

{
$liczba_wierszy=pg_num_rows($r);
print"Wybierz studenta<br><br>";
print"<form method=\"post\" action=\"studenci.php\">";
print"<select name='student' size='7'>";

for ($i=0; $i<$liczba_wierszy; $i++)

{
	$id_studenta=pg_result($r,$i,0);
	$nazwisko=pg_result($r,$i,1);
	$imie=pg_result($r,$i,2);
	print("<option value='$id_studenta'/>ID studenta:$id_studenta, Nazwisko:$nazwisko, Imię:$imie");
}
print"</select><br><br>";
print"<input type='submit' value='Prześlij'/>";
print"</form>";
}
?>

