<?php
$imie =$_POST['f_imie'];
$nazwisko=$_POST['f_nazwisko'];
$telefon=$_POST['f_telefon'];


    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="INSERT INTO `czytelnicy` (`id`, `imie`, `nazwisko`, `telefon`) VALUES (NULL, '$imie', '$nazwisko', '$telefon')";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $baza->close();
    echo "<tr><td>.</td><td>$imie</td><td>$nazwisko</td><td>$telefon</td><td>???</td></tr>";
?>

