<?php

$ChEID = $_POST['ChEID'];
//echo "$ChEID";
//echo "<a href='eventliste.php' class='btn btn-outline-info' role='button' aria-pressed='true'>zurück</a>";
//echo "<a href='projektauswahl.php' button type='submit' class='btn btn-primary' class='btn btn-outline-info' role='button' aria-pressed='true'>spenden</a><br><br>";
$SID=$_GET['SID'];
//echo "SID:".$SID." ChEID:".$ChEID;
?>

<?php

include("dbheader.php");
$dbtabelle = "charity_event";

$statement = $pdo->prepare("SELECT *,(SELECT sum(Betrag) FROM spendet WHERE ChEID=:ChEID) AS bisSpenden FROM $dbtabelle WHERE ChEID=:ChEID");
$result = $statement->execute(array('ChEID' => $ChEID));
while ($row = $statement->fetch()) {

    $ChName = $row['ChName'];
    $BildDateiName = $row['BildDateiName'];
    $ChDatum = $row['ChDatum'];
    $ChAdresse = $row['ChAdresse'];
    $Beschreibung = $row['Beschreibung'];
    $bisSpenden = $row['bisSpenden'];

//echo $ChEID . " " . $ChName. " " . $ChDatum . " " . $ChAdresse . " " . $Beschreibung . " " . $BildDateiName." " . $bisSpenden."</br>";
//echo $ChEID . " "; 
    echo "<div class='container'>";
    echo "<div class='container'></br>";

    echo "<h2>$ChName<span class='badge badge-secondary'></span></h2></br>";

    echo "<div class='row'>";

    echo "<div class='col-sm-7'>";
    echo "<div class='row align-items-start'>";

    echo "<div class='col'>";
    echo 'Adresse,</br>Datum</br></br>';
    echo $ChAdresse . "</br>";
    echo $ChDatum . "";
    echo "</div>";
    echo "<div class='col-5'>";
    echo 'Beschreibung</br></br></br>';
    echo $Beschreibung . "</br>";
    echo "</div>";
    echo "<div class='col'>";
    echo 'Bisherige</br>Spenden(€)</br></br>';
    echo $bisSpenden . "";
    echo "</div>";

    echo "</div>";
    echo "</div></br></br>";

    //echo "<div class='col-sm-3'>";  
    //echo "<div class='row align-items-start'>";
    //echo "</div>";
    //echo "</div>";
//echo $BildDateiName. "</br>";
    echo "<div class='col-sm-3'>";
    echo "<img src='img/event/$BildDateiName' idth='270' height='270' alt='' />";
    echo "</div>";

    echo "</div></br></br>";

    echo "        <div class='col-sm mx-0 px-0'>";
    echo "            <form action='projektauswahl.php?SID=$SID&ChName=$ChName' method='post'>";
    echo "                <div class='form-group'>";
    echo "                    <input type='text' class='form-control d-none' name='ChEID' value='$ChEID'>";
    echo "<a href = 'eventliste.php?SID=$SID' class = 'btn btn-outline-info' role = 'button' aria-pressed = 'true'>zurück</a>";
    echo "                    <button type='submit' class='btn btn-primary'>spenden</button><br><br>";
    echo "                </div>";
    echo "            </form>";
    echo "        </div>";

//echo "<a href = 'projektauswahl.php' button type = 'submit' class = 'btn btn-primary' class = 'btn btn-outline-info' role = 'button' aria-pressed = 'true'>spenden</a><br><br>";
//echo "<button type = 'button' class = 'btn btn-dark'>$ChName</button>";

    echo "</div>";
    echo "</div>";
}
?>








