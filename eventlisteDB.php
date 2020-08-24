<?php

//$ChEID = $_POST['ChEID'];
//echo "$ChEID";
//echo "<a href='eventliste.php' class='btn btn-outline-info' role='button' aria-pressed='true'>zurück</a>";
//echo "<a href='projektauswahl.php' button type='submit' class='btn btn-primary' class='btn btn-outline-info' role='button' aria-pressed='true'>spenden</a><br><br>";
?>


<?php

include("dbheader.php");
$dbtabelle = "charity_event";
$bisSpenden = "";
$SID = $_GET["SID"];
//echo "SID:" . $SID;

$curdate = date("Y-m-d");
//echo $curdate;
$statement = $pdo->prepare("SELECT * FROM $dbtabelle where ChDatum <= '$curdate' order by ChDatum desc");
$result = $statement->execute();

while ($row = $statement->fetch()) {

    $ChName = $row['ChName'];
    $ChEID = $row['ChEID'];

    $statement1 = $pdo->prepare("SELECT *,(SELECT sum(Betrag) FROM spendet WHERE ChEID=:ChEID) AS bisSpenden FROM $dbtabelle WHERE ChEID=:ChEID");
    $result1 = $statement1->execute(array('ChEID' => $ChEID));
    if ($row1 = $statement1->fetch()) {
        //$ChName = $row['ChName'];
        //$BildDateiName = $row['BildDateiName'];
        //$ChDatum = $row['ChDatum'];
        //$ChAdresse = $row['ChAdresse'];
        //$Beschreibung = $row['Beschreibung'];
        $bisSpenden = $row1['bisSpenden'];
    }

    echo "<div class='container'>";
    echo "<div class='container'></br>";

    echo "    <div class='row'>";

    echo "<div class='col-sm-4'>";
    echo "<div class='col'>";
    echo 'Bezeichnung</br>';
    echo "            <button type='button' class='btn btn-info w-100 disabled'>$ChName</button>";
    echo "        </div></br>";
    echo "        </div>";

    //echo 'Bisherige</br>Spenden(€)';
    //echo $bisSpenden . "";
    echo "<div class='col-sm-3'>";
    echo "<div class='col'>";
    echo 'Bisherige Spenden(€)</br>';
    echo "            <button type='button' class='btn btn-info w-100 disabled'>$bisSpenden</button>";
    echo "        </div>";
    echo "        </div>";


    echo "<div class='col-sm-4'>";
    echo "<div class='col'>";
    echo '</br>';
    echo "            <form action='event.php?SID=$SID' method='post'>";
    echo "                <div class='form-group'>";
    echo "                    <input type='text' class='form-control d-none' name='ChEID' value='$ChEID'>";
    echo "                    <button type='submit' class='btn btn-primary'>Details und spenden</button>";
    echo "                </div></br></br>";
    echo "            </form>";
    echo "        </div>";
    echo "    </div>";

    echo "</div>";
    echo "</div>";

    echo "</div>";
}
?>

