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
print"<form method=\"post\" action=\"studenci2.php\">";
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

<?
include "plik.php";

if ($_POST[student] == '')
{
	print"Wybierz studenta.";
	print"<br><a href='http://v-ie.uek.krakow.pl/~s180473/s180473.php'>Powrót</a>";
}
else

{

$con = pg_connect("host=sbazy user=s180473 dbname=s180473 password=$h");

$s="select distinct id_wykladu, nazwa_wykladu, nazwisko, imie, FROM (pracownicy inner join wykladowcy ON pracownicy.id_pracownika=wykladowcy.id_wykladowcy) inner join wyklady using(id_wykladowcy) inner join studenci_wyklady using(id_wykladu) where id_studenta=$_POST[student]";


$r=pg_exec($con,$s);



$id_wykladu=pg_result($r, 0, 0);

$nazwa_wykladu=pg_result($r, 0, 1);

$nazwisko=pg_result($r, 0, 2);

$imie=pg_result($r, 0, 3);



print"<table border='1' cellpadding='4'>";

print"<tr><td>ID wykładu</td><td>Nazwa wykładu</td><td>Nazwisko wykładowcy</td><td>Imię wykładowcy</td><td>";

print"<tr><td>$id_wykladu</td><td>$nazwa_wykladu</td><td>$nazwisko</td><td>$imie</td><td>";

print"</table>";


}

?>

