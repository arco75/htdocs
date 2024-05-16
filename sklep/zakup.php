<?php

$klient=$_POST['f_klient'];
$towar=$_POST['f_towar'];
$dataOperacji=$_POST['f_data'];
//$data=date("Y-m-d");

    include 'dbconfig.php';
    session_start();
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="INSERT INTO `operacje` (id,idk,idt,`data`) VALUES (NULL, $klient,$towar,'$dataOperacji')";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $baza->close();

?>
