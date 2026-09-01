<?php

declare(strict_types=1);

namespace Framework;

use PDO, PDOException, PDOStatement;

class Database
{
    private PDO $connection;
    private PDOStatement $stm;
    private Database $db;

    public function __construct(
        string $driver,
        array $config,
        string $username,
        string $password
    ) {
        $config = http_build_query(data: $config, arg_separator: ';');

        $dsn = "{$driver}:{$config}";

        try {
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Unable to connect to database");
        }
    }

    public function query(string $query, array $params = []): Database
    {
        $this->stm = $this->connection->prepare($query);
        $this->stm->execute($params);
        return $this;
    }
    public function getDb(): Database
    {
        return $this;
    }
    public function count()
    {
        return  $this->stm->fetchColumn();
    }
}
