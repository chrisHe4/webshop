<?php

require_once("./config.php");

session_start();

if (!isset($_SESSION["warenkorb"])) {
    $_SESSION["warenkorb"] = array();
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($db_server, $db_login, $db_password, $db_database);



 