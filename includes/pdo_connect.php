<?php
require 'config/sql.php';
$dsn = 'mysql:host=localhost;dbname=tablica;';

$db = new PDO($dsn, 'user', 'password' );

