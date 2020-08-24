<?php

$SID = $_GET['SID'];
$ChEID = $_GET['ChEID'];
$ChName = $_GET['ChName'];
$PID = $_POST['PID'];
$Betrag = $_POST['Betrag'];
//echo "SID:" . $SID . " ChEID:" . $ChEID . " PID:" . $PID . " ChName:" . $ChName . " Betrag:" . $Betrag;

include("dbheader.php");
$dbtabelle = "spendet";

if (strlen($Betrag) == 0 & $PID == 'Select') {
        echo 'Bitte ein Projekt auswählen und einen Betrag angeben!<br>';
} elseif (strlen($Betrag) == 0) {
    echo 'Bitte einen Betrag angeben!<br>';
} elseif ($PID == 'Select') {
    echo 'Bitte ein Projekt auswählen!<br>';
} else {
    echo "<div class='container'>";
    echo "<div class='container'></br>";

    $statement = $pdo->prepare("Select PID from $dbtabelle where PID = :PID and SID = :SID and ChEID = :ChEID");
    $result = $statement->execute(array('PID' => $PID, 'SID' => $SID, 'ChEID' => $ChEID));
    if ($statement->rowCount() >= 1) {
        echo 'Sie haben schon für das Projekt gespendet!<br>';
    } else {
        $statement = $pdo->prepare("INSERT INTO $dbtabelle (PID, SID, ChEID, Betrag, Datum) VALUES (:PID, :SID, :ChEID, :Betrag, CURRENT_DATE)");
        echo 'Sie haben erfolgreich aufs Projekt gespendet! Vielen Dank für Ihre Spenden!!!<br>';
        try {
            $statement->execute(array('PID' => $PID, 'SID' => $SID, 'ChEID' => $ChEID, 'Betrag' => $Betrag));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

echo "        <div class='col-sm mx-0 px-0'>";
echo "            <form action='' method='post'>";
echo "                <div class='form-group'>";
echo "                    <input type='text' class='form-control d-none' name='ChEID' value='$ChEID'>";
echo "<a href = 'projektauswahl.php?SID=$SID&ChEID=$ChEID&ChName=$ChName' class = 'btn btn-outline-info' role = 'button' aria-pressed = 'true'>zurück</a>";
//echo "                    <button type='submit' class='btn btn-primary'>spenden</button><br><br>";
echo "                </div>";
echo "            </form>";
echo "        </div>";

echo "</div>";
echo "</div>";
?>
           