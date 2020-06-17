<?php

namespace App\Box;

use App\Database;

class DbBox extends AbstractBox
{
    private $pdo;
    public static $tableName = 'storage';

    protected function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function save()
    {
        $query = $this->pdo->prepare("REPLACE INTO {$this::$tableName} (`key`, `value`) VALUES (:key, :value)");
        $query->bindParam(':key', $key);
        $query->bindParam(':value', $value);

        $data = $this->storage;
        foreach ($data as $key => $value) {
            $query->execute();
        }
    }

    public function load()
    {
        $sql = "SELECT * FROM {$this::$tableName}";
        $data = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($data as ['key' => $key, 'value' => $value]) {
            $this->setData($key, $value);
        }
    }
}
