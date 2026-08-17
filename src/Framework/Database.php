<?php

declare(strict_types=1);

namespace Framework;

use PDO;

class Database
{
    public PDO $connection;
    public function __construct(string $driver, array $config, string $username, $password)
    {
        $config = http_build_query(data: $config, arg_separator: ';');
        $dsn = "{$driver}:{$config}";
        $this->connection = new PDO($dsn, $username, $password);
    }
}
