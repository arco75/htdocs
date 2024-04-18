<?php
$id=$_GET["id"];

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="SELECT * FROM klienci WHERE `id`= $id";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');

while($wiersz = $result->fetch_assoc())
{
?>

<h4>Edycja klienta</h4>
<form method="POST" action="updateklient.php" id="formUpdateKlient">
<input hidden value="<?php echo $wiersz['id']; ?>" type="text" name="f_id" autocomplete="off">
Nazwa firmy: <input value="<?php echo $wiersz['nazwa']; ?>" type="text" name="f_nazwa" autocomplete="off">
<br>Adres firmy: <input value="<?php echo $wiersz['adres']; ?>"type="text" name="f_adres" autocomplete="off">
<br>Telefon: <input value="<?php echo $wiersz['telefon']; ?>"type="text" name="f_telefon" autocomplete="off">
<br><button type="submit" id="add"> ZAPISZ ZMIANY </button>
</form>

<?php
};

$baza->close();
?>


<script>
$(document).ready(function() {
  $("#formUpdateKlient").submit(function () {

        $.ajax({
          url: "goupdateklient.php",
          type: "POST",
          data: $("#formUpdateKlient").serialize(),
          cache: false,
          success: function (response) { 
         
           $("#strona").load("showklienci.php");
          }
        });
return false;
});   
   
    
}); 
</script>