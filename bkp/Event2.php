<?php
session_start();
if (!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hope</title>
        <?php include("mainHeader.php"); ?>
        <link href="css/eventliste.css" rel="stylesheet" />
        <script src="js/eventliste.js"></script>
    </head>
    <body>        
        <div class="container-md p-3">
            <?php include("navbar.php"); ?>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div><br>
            <h1>Abendessen mit Musik</h1>
        </div> <!--class="container-md p-3" -->

        <div class="container">
            <div class="col-sm-6"><br>
                <a href="Eventliste.php" class="btn btn-outline-info" role="button" aria-pressed="true">zurück</a>
                <a href="Projektauswahl.php" class="btn btn-outline-info" role="button" aria-pressed="true">spenden</a>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>   

            <div class="container-md p-3">
                <?php include("mainFooter.php"); ?>
            </div>
        </div>
    </body>
</html>


