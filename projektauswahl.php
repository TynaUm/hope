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
        <link href="css/projektauswahl.css" rel="stylesheet" />
        <script src="js/projektauswahl.js"></script>

        <script>
            $(document).ready(function () {
                $("select.charity_event").change(function () {
                    var selectedprojekt = $(".charity_event option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: "projektauswahlDB.php",
                        data: {charity_event: selectedprojekt}
                    }).done(function (data) {
                        $("#response").html(data);
                    });
                });
            });
        </script>
        <!--<script type="text/javascript">
            $(document).ready(function(){
                $("button").click(function(){
        
                    $.ajax({
                        type: 'POST',
                        url: 'script.php',
                        success: function(data) {
                            alert(data);
                            $("p").text(data);
        
                        }
                    });
           });
        });
        </script>-->

    </head>
    <body>       
        <div class="container-md p-3">
            <?php include("navbar_1.php"); ?>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div><br>
            <h1>Projektauswahl</h1><br>
        </div> <!--class="container-md p-3" -->

        <div class="container myContainer">
            <div class="row"><br>
                <?php include("projektauswahlDB.php"); ?>
                
                <!--<select class="charity_event">
                    <option>Select</option>
                    <option value="Konzert">Konzert</option>
                    <option value="Abendessen mit Musik">Abendessen mit Musik</option>
                </select>-->
                
            </div>
        </div>                 

        <div class="container-md p-3">
            <?php include("mainFooter.php"); ?>
        </div>

    </body>
</html>

