


<?php

if (!isset($_COOKIE['loggedin'])) {
    echo "<nav class='navbar navbar-expand-sm bg-light navbar-light'>
        <a class='navbar-brand' href='index.php' title='Startseite'><img src='img/hope.png' class='float-left mylogo'></a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
            <span class='navbar-toggler-icon'></span>
        </button>
    
       <div class='collapse navbar-collapse' id='collapsibleNavbar'>
        <ul class='navbar-nav'>
              <li class='nav-item'>
                <a class='nav-link'  href='projekte.php'>Projekte</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='kontakt.php'>Kontakt</a>
            </li>
              <li class='nav-item'>
                <a class='nav-link' href='login.php'>Login</a>
            </li>
            </ul>
        </div>
    </nav>";
} else {

    echo "<nav class='navbar navbar-expand-sm bg-light navbar-light'>
    <a class='navbar-brand' href='index.php' title='Startseite'><img src='img/hope.png' class='float-left mylogo'></a>

    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
        <span class='navbar-toggler-icon'></span>
    </button>

    <div class='collapse navbar-collapse' id='collapsibleNavbar'>
        <ul class='navbar-nav'>
              <li class='nav-item'>
                <a class='nav-link'  href='projekte.php'>Projekte</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link'  href='kontakt.php'>Kontakt</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='login.php'>Login</a>
            </li>
        </ul>
    </div>
</nav>";
}
?>

