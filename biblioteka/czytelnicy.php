<h5>Lista czytelników</h5>


<table class="table table-condensed">
    <thead>
        <tr><td>  Lp. </td><td> Imię </td><td> Nazwisko</td><td> Telefon </td><td> Opcje </td></tr> 
    </thead>
    <tbody>
<?PHP
    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

    $zapytanie="SELECT * FROM czytelnicy ORDER BY nazwisko ASC";
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $n=0;

    while($wiersz = $result->fetch_assoc()){

    $n=$n+1;
    
    echo "<tr><td> ".$n."</td><td> ".$wiersz['imie']."</td><td> ".$wiersz['nazwisko']."</td><td> ". $wiersz['telefon']." </td><td>";
    echo $wiersz['id'];
    echo "</td></tr>";
};

$baza->close();

?>
</tbody>
</table>

<hr>
<h4> Dodawanie czytelnika</h4>
<form action="addczytelnik.php" method="POST">
Imię: <input type="text" name="f_imie" placeholder="Tu wpisz imię"><br>
Nazwisko:<input type="text" name="f_nazwisko" placeholder="Tu wpisz nazwisko"><br>
Telefon:<input type="text" name="f_telefon" placeholder="telefon"><br>
<button type="submit">Dodaj do bazy</button>
</form>