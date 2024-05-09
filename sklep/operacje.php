<h1> Operacje</h1>

<form method="POST" action="zakup.php">
<input type="date" name="f_data">
<br>Klient:
<select name="f_klient">

    

    <?PHP
    include 'dbconfig.php';
    session_start();
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="SELECT id, nazwa FROM klienci ORDER BY nazwa ASC";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    while($wiersz = $result->fetch_assoc()){

       echo "<option value='".$wiersz['id']."'>".$wiersz['nazwa']."</option>\n";
    };


?>
  
</select>
<br>Towar:
<select name="f_towar">
    
<?PHP
    
    $zapytanie="SELECT id, nazwa FROM towary ORDER BY nazwa ASC";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');


    while($wiersz = $result->fetch_assoc()){

       echo "<option value='".$wiersz['id']."'>".$wiersz['nazwa']."</option>\n";
    };

    $baza->close();
?>
  
</select>

<br>
<button type="submit"> Zapłacono </button> 
</form>