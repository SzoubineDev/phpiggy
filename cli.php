<?php
include __DIR__ . "/src/Framework/Database.php";

use Framework\Database;

$db = new Database('mysql', [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'phpiggy'
], 'root', '');

try {
    // $db->connection->beginTransaction();
    // $db->connection->query("INSERT INTO products VALUES (99,'Gloves')");

    $search = "Gloves";
    $query = "SELECT * FROM products WHERE name = :name ";
    $stm = $db->connection->prepare($query);
    $stm->bindValue('name', $search, PDO::PARAM_STR);
    $stm->execute();
    var_dump($stm->fetchAll());

    // $db->connection->commit();
} catch (Exception $error) {

    if ($db->connection->inTransaction()) {
        $db->connection->rollBack();
    }
    echo "transaction faild! ";
}
