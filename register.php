<?php
include("dbheader.php");
$dbtabelle = "spender";

session_start();

if (isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if (strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if ($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if (!$error) {
        $statement = $pdo->prepare("SELECT * FROM $dbtabelle WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if ($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if (!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO $dbtabelle(email, passwort, vorname, nachname) VALUES (:email, :passwort, :vorname, :nachname)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname));

        if ($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hope</title>
        <?php include("mainHeader.php"); ?>
        <link href="css/register.css" rel="stylesheet" />
        <script src="js/register.js"></script>
    </head>
    <body>        
        <div class="container-md p-3">
            <?php include("navbar.php"); ?>

            
            <form action="register.php?register=1" method="post"><br>
                <h1>Neuregistrierung</h1><br>
                <input type="text" name="vorname" placeholder="Vorname"/><br>
                <input type="text" name="nachname" placeholder="Nachname"/><br>
                <input type="text" name="email" placeholder="E-Mail"/><br>
                <input type="password" name="passwort" placeholder="Passwort"/><br>
                <input type="password" name="passwort2" placeholder="Passwort wiederholen"/><br><br>
                <input type="submit" name="Registrieren" value="Registrieren">
            </form>
            <br>
            <p>Sie haben bereits ein Konto?
                <a href="login.php" class="button-back">Einloggen</a>
            </p>

            <?php include("mainFooter.php"); ?>	
        </div> <!--class="container-md p-3" -->
    </body>
</html>