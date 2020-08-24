<?php
if (isset($_POST['ChEID'])) $ChEID = $_POST['ChEID'];
if (isset($_GET['ChEID'])) $ChEID = $_GET['ChEID'];
$SID = $_GET["SID"];
$ChName = $_GET["ChName"];
//echo "SID:" . $SID . " ChEID:" . $ChEID . " ChName:" . $ChName;
?>

<div class='container'>
    <div class='container'></br>
        <div class='row'>

            <div class='col-sm-4'>
                <div class='row align-items-start'>

                    <div class='col'>
                        Charity Eventlist
                        <div class='col-sm mx-0 px-0'>
                            <button type='button' class='btn btn-info w-100 disabled'><?php echo $ChName ?></button>
                        </div></br></br>
                    </div>

                </div>
            </div></br></br>

            <div class='col-sm-2'>
                Projekte</br>
                <?php echo "<form action='spenden.php?SID=$SID&ChEID=$ChEID&ChName=$ChName' method='post'>" ?>
                    <select class = 'charity_event' name='PID'>
                        <option>Select</option>
                        <?php
                        include("dbheader.php");
                        $dbtabelle = "projekt";

                        $statement = $pdo->prepare("SELECT * FROM $dbtabelle");
                        $result = $statement->execute();
                        while ($row = $statement->fetch()) {
                            $PID = $row['PID'];
                            $PName = $row['PName'];
                            echo "<option value = '$PID'>$PName</option>";
                        }
                        ?>    

                    </select ></br></br></br></br></br></br>


                </br></div>

            <div class='col-sm-3'>
                <!--<form action = 'projektauswahl.php?projektauswahl=1' method = 'post'>-->
                Betrag</br>
                <input type = 'text' name = 'Betrag' placeholder = '€'/><br>

            </div>
        </div></br></br>

        <div class='col-sm mx-0 px-0'>

            <div class='form-group'>
                <!--<input type='text' class='form-control d-none' name='ChEID' value='$ChEID'>-->
                <a href = 'eventliste.php<?php echo "?SID=$SID"?>' class = 'btn btn-outline-info' role = 'button' aria-pressed = 'true'>zurück</a>
                <button type='submit' value='spenden' class='btn btn-primary'>spenden</button><br><br>
            </div>
            </form>
        </div>

    </div>
</div>
