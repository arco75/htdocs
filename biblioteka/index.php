<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUP - biblioteka</title>
    
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jq.min.js"></script>
</head>
<body>
    
<div class="container">
    
    
    <div class="jumbotron logo">
        <h1>Biblioteka</h1>
        <p>Projekt na zaliczenie Baz Danych - R2IN</p>
    </div>
    <div id="log"> 
        <?php
            session_start();
            if(isset($_SESSION['pu']))
                echo "Witaj ". $_SESSION['kto']."<br><a href='logout.php'> { Logout }</a>"; 
            else
                echo "<a href='login.php'>{ Login }</a>"; 
       ?>
    </div>
    
    
    <div class="row">
        <div class="col-sm-2" id="menu">Menu <br>
        <div class="btn-group-vertical">
            <button type="button" class="btn btn-primary link" attr="czytelnicy.php"> Czytelnicy </button>
            <button type="button" class="btn btn-primary link" attr="ksiegozbior.php"> Księgozbiór </button>
            <button type="button" class="btn btn-primary link" attr="akcja.php"> Akcja </button>
        </div>
        </div>
        <div class="col-sm-10" id="strona">Witaj na mojej stronie bilioteki</div>
    </div>

    <div class="row">
        <div class="col-sm-12">&#169; Studenci MUP - 2024</div>
    </div>
</div>
<script src="./js/app.js" defer></script>
</body>
</html>