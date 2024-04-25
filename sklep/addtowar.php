<?PHP
 $f_nazwa = $_POST["f_nazwa"];
 $f_ilosc = $_POST["f_ilosc"];
 $f_cena = $_POST["f_cena"];


    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="INSERT INTO `towary` (`nazwa`, `ilosc`, `cena`) VALUES ('$f_nazwa', '$f_ilosc', '$f_cena');";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    $baza->close();
   echo "<tr><td>n</td><td>$f_nazwa</td><td> $f_ilosc </td><td> $f_cena </td><td>op</td></tr>";
?>