<script>
$(document).ready(function() {

    $("#form_addczytelnik").submit(function(){
        $.ajax({
          url: "addczytelnik.php",
          type: "POST",
          data: $("#form_addczytelnik").serialize(),
          cache: false,
          success: function (response) {    
                    //$("#tabczytelnicy").append(response);
                    $("#strona").load("czytelnicy.php");
                    }
        });
        
        return false;
    });   
   
    
}); 

</script>
<h5>Lista czytelników</h5>


<table class="table table-condensed" id="tabczytelnicy">
    <thead>
        <tr><td>  Lp. </td><td> Imię </td><td> Nazwisko</td><td> Telefon </td><td> Opcje </td></tr> 
    </thead>
    <tbody>
<?PHP
    session_start();
    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="SELECT * FROM czytelnicy ORDER BY nazwisko ASC";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $n=0;

    while($wiersz = $result->fetch_assoc()){

    $n=$n+1;
    
    echo "<tr><td> ".$n."</td><td> ".$wiersz['imie']."</td><td> ".$wiersz['nazwisko']."</td><td> ". $wiersz['telefon']." </td><td>";
    if(isset($_SESSION['pu']) && ($_SESSION['pu']<=0))
        echo "<a href=delczytelnik.php?id=".$wiersz['id']."> X </a>";  
        echo "<a href=editczytelnik.php?id=".$wiersz['id']."> E </a>";  
    echo "</td></tr>";
};

$baza->close();

?>
</tbody>
</table>

<hr>
<?php

if(isset($_SESSION['pu']) && $_SESSION['pu']<=1){
?>

<h4> Dodawanie czytelnika</h4>
<form action="addczytelnik.php" method="POST" id="form_addczytelnik">
Imię: <input type="text" name="f_imie" placeholder="Tu wpisz imię"><br>
Nazwisko:<input type="text" name="f_nazwisko" placeholder="Tu wpisz nazwisko"><br>
Telefon:<input type="text" name="f_telefon" placeholder="telefon"><br>
<button type="submit">Dodaj do bazy</button>
</form>
<?php
};
?>