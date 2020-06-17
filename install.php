<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Database;
use App\Box\DbBox;

$db = Database::getConnection();
$table = DbBox::$tableName;

$sql = "CREATE TABLE IF NOT EXISTS {$table} (
    `key` varchar(255) NOT NULL PRIMARY KEY,
    `value` varchar(255) DEFAULT NULL
)";
$db->query($sql);

echo "Installed\n";
