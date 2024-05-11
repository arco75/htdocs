<?php
$id=$_POST['f_id'];
$imie=$_POST['f_imie'];
$nazwisko=$_POST['f_nazwisko'];
$telefon=$_POST['f_telefon'];

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="UPDATE `czytelnicy` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `telefon` = '$telefon' WHERE `czytelnicy`.`id` = $id;";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');

$baza->close();
?>
<meta http-equiv='Refresh' content='2; url=http://localhost/biblioteka/index.php' >

