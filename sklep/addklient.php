<?PHP
 $f_nazwa = $_POST["f_nazwa"];
 $f_adres = $_POST["f_adres"];
 $f_telefon = $_POST["f_telefon"];


    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="INSERT INTO `klienci` (`nazwa`, `adres`, `telefon`) VALUES ('$f_nazwa', '$f_adres', '$f_telefon');";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    $baza->close();
   echo "<tr><td>n</td><td>$f_nazwa</td><td> $f_adres </td><td> $f_telefon </td><td>op</td></tr>";
?>