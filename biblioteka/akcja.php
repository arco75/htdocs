<h5> Akcja (W/Z)</h5>


<form method="post" action="writeakcja.php">
<h2> Czytelnik</h2>

<select name="f_kto">
    
   <?php
   include 'dbconfig.php';
   $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

   $zapytanie="SELECT * FROM czytelnicy ORDER BY nazwisko ASC";
   $result = $baza->query($zapytanie) or die ('bledne zapytanie');


   while($wiersz = $result->fetch_assoc()){
    echo "<option value=".$wiersz['id']."> ".$wiersz['imie']." ". $wiersz['nazwisko']." </option>\n";
   
};

$baza->close();

   ?>
</select>


<h2> Elementy</h2>
<select name="f_co">
<?php
   include 'dbconfig.php';
   $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

   $zapytanie="SELECT * FROM books ORDER BY tytul ASC";
   $result = $baza->query($zapytanie) or die ('bledne zapytanie');


   while($wiersz = $result->fetch_assoc()){
    echo "<option value=".$wiersz['id']."> ".$wiersz['tytul']." | ". $wiersz['autor']." </option>\n";
   
};

$baza->close();

   ?>
</select>
<br><br>
<input type="date" name="f_kiedy">
<br>
<button type="submit"> Akcja</button>
</form>