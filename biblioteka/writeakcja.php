<?php
$kto=$_POST['f_kto'];
$co=$_POST['f_co'];
$kiedy=$_POST['f_kiedy'];

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="INSERT INTO `operacje` (`data`, `idk`, `idc`, `stan`) VALUES ( '$kiedy','$co', '$kto', '1')";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');

$baza->close();

?>