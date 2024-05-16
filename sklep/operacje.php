<h1> Operacje</h1>

<form method="POST" action="zakup.php">
<input type="date" name="f_data" id="f_data">
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

<h2>Oto zakupy:</h2>
<?PHP
include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z polaczenie z BD');

$zapytanie="SELECT K.nazwa AS K_nazwa, T.nazwa AS T_nazwa, O.data FROM operacje AS O,klienci AS K,towary AS T WHERE O.idk = K.id AND O.idt = T.id;";
$result = $baza->query($zapytanie) or die ('bledne zapytanie');

$n=0;
while($wiersz = $result->fetch_assoc())
{
    $n=$n+1;
    echo "<br>[".$n."] ".$wiersz['K_nazwa']." -> ".$wiersz['T_nazwa']." dnia:".$wiersz['data'];
};
$baza->close();
?>

<script>
    let d = new Date();
    let day = d.getDate(); 
    let month = d.getMonth() + 1;  
    let year = d.getFullYear(); 
    
    wynik=day+"-"+month+"-"+year;
    document.getElementById('f_data').value=wynik;
</script>