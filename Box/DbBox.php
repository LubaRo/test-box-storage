<?php

namespace Box;

/**
 * DbBox
 *
 * Allows to save and load box data from database
 */
class DbBox extends AbstractBox
{
    private $dbTable = 'storage';
    private $dbName  = '';
    private $dbHost  = '';
    private $dbUser  = '';
    private $dbPwd   = '';

    /**
     * Prepare multiple values for sql query
     *
     * @return string
     */
    private function prepareValuesRow(): string
    {
        $values = [];
        foreach ($this->storage as $key => $value) {
            $values[] = "('{$key}', '{$value}')";
        }

        return implode(', ', $values);
    }

    /**
     * Save box data to database
     *
     * @return void
     */
    public function save()
    {
        $pdo = $this->getDbConnection();
        $valuesRow = $this->prepareValuesRow();

        $pdo->exec("REPLACE INTO {$this->dbTable} (`key`, `value`) VALUES {$valuesRow}");
    }

    /**
     * Load data from database to box instance
     *
     * @return void
     */
    public function load()
    {
        $pdo = $this->getDbConnection();
        $query = "SELECT * FROM {$this->dbTable}";
        $data = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($data as ['key' => $key, 'value' => $value]) {
            $this->setData($key, $value);
        }
    }

    /**
     * Establishes and returns a database connection
     *
     * @return \PDO
     */
    private function getDbConnection()
    {
        $data = "mysql:dbname={$this->dbName};host={$this->dbHost}";
        $pdo = new \PDO($data, $this->dbUser, $this->dbPwd);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
