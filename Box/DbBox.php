<?php

namespace Box;

class DbBox extends AbstractBox
{
    private $dbTable = 'storage';
    private $dbName  = '';
    private $dbHost  = '';
    private $dbUser  = '';
    private $dbPwd   = '';

    private function prepareValuesRow()
    {
        $values = [];
        foreach ($this->storage as $key => $value) {
            $values[] = "('{$key}', '{$value}')";
        }

        return implode(', ', $values);
    }

    public function save()
    {
        $pdo = $this->getDbConnection();
        $valuesRow = $this->prepareValuesRow();

        $pdo->exec("REPLACE INTO {$this->dbTable} (`key`, `value`) VALUES {$valuesRow}");
    }

    public function load()
    {
        $pdo = $this->getDbConnection();
        $query = "SELECT * FROM {$this->dbTable}";
        $data = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($data as ['key' => $key, 'value' => $value]) {
            $this->setData($key, $value);
        }
    }

    private function getDbConnection()
    {
        $data = "mysql:dbname={$this->dbName};host={$this->dbHost}";
        $pdo = new \PDO($data, $this->dbUser, $this->dbPwd);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
