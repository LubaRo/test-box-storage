<?php

namespace App;

class Database
{
    private static $connection;

    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            throw new \Exception('Connection with database in not established.');
        }
        return self::$connection;
    }

    public static function connect($db, $host, $user, $password)
    {
        if (!isset(self::$connection)) {
            $info = "mysql:dbname={$db};host=$host";
            self::$connection = new \PDO($info, $user, $password);
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}
