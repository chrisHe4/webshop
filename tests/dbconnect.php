<?php

require_once("./config.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($db_server, $db_login, $db_password, $db_database);

/* get the name of the current default database */
$result = $mysqli->query("SELECT * FROM `kunde`");

$row = $result->fetch_row();
var_dump($row);

 