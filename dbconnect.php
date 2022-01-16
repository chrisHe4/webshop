<?php

require_once("./config.php");

session_start();
//hier wird geschaut ob ob warenkorb schon existiert und wenn ja dann gibt es array zuruck
if (!isset($_SESSION["warenkorb"])) {
    $_SESSION["warenkorb"] = array();
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($db_server, $db_login, $db_password, $db_database);



 