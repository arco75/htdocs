<h3>Lista Towarów</h3>

<table class="table table-condensed" id="tabtowary">
  
  <thead>
    <tr>
    <th>Lp.</th> <th>Nazwa</th> <th>Ilość</th> <th>Cena</th><th>Operacje</th> </tr>
  </thead>

  <tbody>

  <?PHP
    include 'dbconfig.php';
    session_start();
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="SELECT * FROM towary ORDER BY nazwa ASC";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $n=0;

    while($wiersz = $result->fetch_assoc())
{
    $n=$n+1;
    
    echo "<tr><td>".$n."</td><td>".$wiersz['nazwa']."</td><td>".$wiersz['ilosc']."</td><td>". $wiersz['cena']." </td><td>";
    if(isset($_SESSION['pu']) && ($_SESSION['pu']==0)){ 
      echo "<a href=deltowar.php?id=".$wiersz['id']."><button>X</button></a>";
      echo "<button class='menu' mup='edittowar.php?id=".$wiersz['id']."'>E</button>";
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
<h4>Dodawanie towarów</h4>

<form method="POST" action="addtowar.php" id="formAddTowar">

Nazwa towaru: <input type="text" name="f_nazwa"  placeholder="nazwa" autocomplete="off">
<br>Ilość: <input type="text" name="f_ilosc"  placeholder="wpisz ilosc" autocomplete="off">
<br>Cena: <input type="text" name="f_cena"  placeholder="cena towaru" autocomplete="off">
<br><button type="submit" id="add"> DODAJ </button>
</form>
<?php
};
?>


<script>
$(document).ready(function() {
  $("#formAddTowar").submit(function () {

        $.ajax({
          url: "addtowar.php",
          type: "POST",
          data: $("#formAddTowar").serialize(),
          cache: false,
          success: function (response) { 
            
           $("#tabtowary").append(response);
          }
        });
return false;
});   
   
    
}); 
</script>
<script src="./js/app.js"></script>