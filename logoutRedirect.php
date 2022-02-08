<?php
    header('Refresh:0; url=logout.php');
    $pageName = 'Logout';
    include('htmlHeader.php');
    // Logout --> Sessions zurücksetzen
    session_unset();
    session_destroy();
    $_SESSION["warenkorb"] = array();
    $_SESSION['webshopLogin'] = array();
?>
