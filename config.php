<?php
const DBHOST = 'localhost';
const DBUSER = 'root';
const DBPASS = '';
const DBNAME = 'db_sgp';
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($conn->connect_error) {
die('Não Conectou com banco de dados!' . $conn->connect_error);
}
?>