<?php
const servername = 'localhost';
const username = 'root';
const password = '';
const db = 'WE4A';
$con = new mysqli(servername,
    username, password, db);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
