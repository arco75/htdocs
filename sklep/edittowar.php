<?php
$id=$_GET["id"];

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="SELECT * FROM towary WHERE `id`= $id";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');

while($wiersz = $result->fetch_assoc())
{
?>

<h4>Edycja towaru</h4>
<form method="POST" action="updatetowar.php" id="formUpdateTowar">
<input hidden value="<?php echo $wiersz['id']; ?>" type="text" name="f_id" autocomplete="off">
Nazwa towaru: <input value="<?php echo $wiersz['nazwa']; ?>" type="text" name="f_nazwa" autocomplete="off">
<br>Ilość: <input value="<?php echo $wiersz['ilosc']; ?>"type="text" name="f_ilosc" autocomplete="off">
<br>Cena: <input value="<?php echo $wiersz['cena']; ?>"type="text" name="f_cena" autocomplete="off">
<br><button type="submit" id="add"> ZAPISZ ZMIANY </button>
</form>

<?php
};

$baza->close();
?>


<script>
$(document).ready(function() {
  $("#formUpdateTowar").submit(function () {

        $.ajax({
          url: "goupdatetowar.php",
          type: "POST",
          data: $("#formUpdateTowar").serialize(),
          cache: false,
          success: function (response) { 
         
           $("#strona").load("showtowary.php");
          }
        });
return false;
});   
   
    
}); 
</script>