<meta http-equiv='Refresh' content='2; url=http://localhost/biblioteka/index.php' >

<?php

$login=$_POST['f_login'];
$haslo=md5($_POST['f_haslo']);


include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="SELECT * FROM operator WHERE login='$login'";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');
    while($wiersz = $result->fetch_assoc()){

        if($wiersz['haslo']==$haslo){
            echo "<b>Udalo sie!</b>";
            session_start();
            $_SESSION['kto']=$wiersz['imienazwisko'];
            $_SESSION['pu']=$wiersz['pu'];
    
        };
    };

$baza->close();

?>