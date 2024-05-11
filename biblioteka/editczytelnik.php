<h4> Edycja czytelnika</h4>
<form action="updateczytelnik.php" method="POST" id="form_updateczytelnik">
<?php

$id=$_GET["id"];

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="SELECT * FROM czytelnicy WHERE `id`='$id'";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');

while($wiersz = $result->fetch_assoc()){
 $wiersz['nazwisko'];

?>
<input type="hidden" name="f_id"  value="<?php echo $id; ?>"><br>
Imię: <input type="text" name="f_imie" value="<?php echo $wiersz['imie'];?>"><br>
Nazwisko:<input type="text" name="f_nazwisko" value="<?php echo $wiersz['nazwisko'];?>"><br>
Telefon:<input type="text" name="f_telefon" value="<?php echo $wiersz['telefon'];?>"><br>

<?php
}
$baza->close();
?>

<button type="submit">Zapisz zmiany</button>
</form>