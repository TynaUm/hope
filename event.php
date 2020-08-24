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
        <link href="css/event.css" rel="stylesheet" />
        <script src="js/event.js"></script>
    </head>
    <body>       
        <div class="container-md p-3">
            <?php include("navbar_1.php"); ?>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div><br>
            <h1>Event</h1><br>
        </div> <!--class="container-md p-3" -->

        <div class="container myContainer">
            <div class="row"><br>
                <?php include("eventDB.php"); ?>
            </div>
        </div>                 

        <div class="container-md p-3">
            <?php include("mainFooter.php"); ?>
        </div>

    </body>
</html>

