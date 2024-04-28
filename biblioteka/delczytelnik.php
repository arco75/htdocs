<?php
$id=$_GET['id'];

    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="DELETE FROM czytelnicy WHERE `czytelnicy`.`id` = $id";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

$baza->close();

?>


<meta http-equiv='Refresh' content='2; url=http://localhost/biblioteka/index.php' >


