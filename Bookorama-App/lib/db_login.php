<?php 
// TODO 1: Buatlah koneksi dengan database
$db_host = 'localhost';
$db_database = 'bookorama';
$db_username = 'root';
$db_password = '';

// connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die("Tidak dapat terhubung dengan database : <br/>" . $db->connect_error);
}

// TODO 2: Buatlah function test_input

?>