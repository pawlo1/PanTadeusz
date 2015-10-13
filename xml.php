<? 
$f = fopen("dokumenty/a.xml","w");
if (is_uploaded_file($_FILES[plik][tmp_name]))
{
$xnazwisko = "<nazwisko>".$_POST['nazwisko']."</nazwisko>\n";
$xplec = "<plec>".$_POST['plec']."</plec>\n";
$xdni = "<dzienTygodnia>".$_POST['dni']."</dzienTygodnia>\n";
$xnazwaPliku = "<nazwaPliku>".$_FILES[plik][name] ."</nazwaPliku>";
$xrozmiarPliku = "<rozmiarPliku>".$_FILES[plik][size] ."</rozmiarPliku>";
$xtypPliku = "<typPliku>".$_FILES[plik][type] ."</typPliku>";
fwrite($f, "<formularz>\n");
fwrite($f, $xnazwisko);
fwrite($f, $xplec);
fwrite($f, $xdni);
fwrite($f, $xnazwaPliku);
fwrite($f, $xrozmiarPliku);
fwrite($f, $xtypPliku);
fwrite($f, "</formularz>");

}

else

echo 'Błąd przy przesyłaniu pliku!';



fclose($f);

?>