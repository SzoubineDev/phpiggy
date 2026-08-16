<?php

$driver = 'mydijdsql';
$config = http_build_query(data: [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => "phpiggy"
], arg_separator: ';');
$dsn =  "{$driver}:{$config}";
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {

}
echo "connected successfully !";
