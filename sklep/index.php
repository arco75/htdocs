<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazy Danych - sklep</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="jumbotron">
                <h1>Projekt na zaliczenie</h1>
                <p>Bazy danych sklep</p>
            </div>
            <div><h5>
            <?php   
            session_start();
                if(!isset($_SESSION['user']))
                        echo "<a href='logowanie.html'>Logowanie</a>";
                else
                    echo "Witaj: ".$_SESSION['user']."(<a href='logout.php'> Exit</a>)";
            ?>
            </h5></div>


        </div>
    </div>

    <div class="row">
    <div class="col-md-2" id="menu">
        <h3>Menu</h3>
        <div class="btn-group btn-group-vertical flex_center" role="group">
            <button class="menu btn btn-secondary" mup="showklienci.php"> Lista klientów </button>
            <button class="menu btn btn-secondary" mup="showtowary.php"> Lista towarów </button>
            <button class="menu btn btn-secondary" mup="operacje.php"> Operacje </button>
        </div>
    </div>
    
    <div class="col-md-10" id="strona">Witaj na mojej stronie</div>
    </div>
    <div class="row">
    <div class="col-md-12">Stopka</div>
    
    </div>
</div>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jq.js"></script>
<script src="./js/app.js"></script>
</body>
</html>