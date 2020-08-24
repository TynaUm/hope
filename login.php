<?php
include("dbheader.php");
$dbtabelle = "spender";

session_start();


$errorMessage = "";

if (isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM $dbtabelle WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
    //die($user["email"]." ".$user['passwort']." ".$passwort." ".password_verify($passwort, $user['passwort']));
    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $SID=$user['SID'];
        $_SESSION['userid'] = $SID;

        //die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');

$cookie_name = "loggedin";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        header("Location: " . "Eventliste.php?SID=$SID");
    } else {

        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hope</title>
        <?php include("mainHeader.php"); ?>
        <link href="css/login.css" rel="stylesheet" />
        <script src="js/login.js"></script>
    </head>
    <body>        
        <div class="container-md p-3">
            <?php include("navbar.php"); ?> 
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div><br>           
            <h1>Einloggen</h1><br>                

                <form action="login.php?login=1" method="post"><br>
                    <input type="text" name="email" placeholder="E-Mail" value="hase@htl.com"/><br>
                    <input type="password" id="passwort" name="passwort" placeholder="passwort" value="geheim"/><br>
                    <input type="checkbox" id="chkBox"> Passwort zeigen <br>
                    <input type="submit" name="Login" value="Login">
                </form>
                <br><p><?php echo $errorMessage ?></p>
                <br>
                <p>Noch nicht registriert? Klicken Sie hier zur
                    <a href="Register.php" class="button-back">Neuregistrierung </a>
                </p>   

            <?php include("mainFooter.php"); ?>
        </div><!--class="container-md p-3" -->

    </body>
</html>

