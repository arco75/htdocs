<h3>Lista klientów</h3>

<table class="table table-condensed" id="tabklienci">
  
  <thead>
    <tr>
    <th>Lp.</th> <th>Nazwa</th> <th>Adres firmy</th> <th>Telefon</th> <th>Opcje</th> 
    </tr>
  </thead>

  <tbody>

  <?PHP
    include 'dbconfig.php';
    session_start();
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="SELECT * FROM klienci ORDER BY nazwa ASC";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $n=0;

    while($wiersz = $result->fetch_assoc())
{
    $n=$n+1;
    
    echo "<tr><td>".$n."</td><td>".$wiersz['nazwa']."</td><td>".$wiersz['adres']."</td><td>". $wiersz['telefon']." </td><td>";
    if(isset($_SESSION['pu']) && ($_SESSION['pu']==0)){ 
      echo "<a href=delklient.php?id=".$wiersz['id']."><button>X</button></a>";
      echo "<button class='menu' mup='editklient.php?id=".$wiersz['id']."'>E</button>";
    };
    echo "</td></tr>\n";
};

$baza->close();

?>

  </tbody>
  
</table>

<?php
if(isset($_SESSION['pu']) && ($_SESSION['pu']>=0)){
  ?>
<h4>Dodawanie klienta</h4>

<form method="POST" action="addklient.php" id="formAddKlient">

Nazwa firmy: <input type="text" name="f_nazwa"  placeholder="nazwa" autocomplete="off">
<br>Adres firmy: <input type="text" name="f_adres"  placeholder="wpisz adres" autocomplete="off">
<br>Telefon: <input type="text" name="f_telefon"  placeholder="telefon do firmy" autocomplete="off">
<br><button type="submit" id="add"> DODAJ </button>
</form>
<?php
};
?>


<script>
$(document).ready(function() {
  $("#formAddKlient").submit(function () {

        $.ajax({
          url: "addklient.php",
          type: "POST",
          data: $("#formAddKlient").serialize(),
          cache: false,
          success: function (response) { 
           
           // alert(response); 
           $("#tabklienci").append(response);
          }
        });
return false;
});   
   
    
}); 
</script>
<script src="./js/app.js"></script>