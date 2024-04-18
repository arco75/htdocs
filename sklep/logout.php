<?php
echo "Zostałeś wylogowany";
session_start();
session_destroy();
?>

<meta http-equiv='Refresh' content='3; url=http://localhost/sklep/' >