<?php
require_once ("Classes/SQLcon.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($SQLcon)) {
    $SQLcon = new SQLcon();
}
?>