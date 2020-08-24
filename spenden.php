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
        <link href="css/spenden.css" rel="stylesheet" />
        <script src="js/spenden.js"></script>
    </head>
    <body>        
        <div class="container-md p-3">
            <?php include("navbar_1.php"); ?>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div><br>
            <h1>Spenden</h1>
        </div><br> <!--class="container-md p-3" -->

        <div class="container myContainer">
            <div class="col-sm"><br>
              <?php include("spendenDB.php"); ?>
            </div>
        </div>

        <div class="container-md p-3">
            <?php include("mainFooter.php"); ?>
        </div>

    </body>
</html>



