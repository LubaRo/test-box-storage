<?php

namespace Box;

abstract class AbstractBox implements BoxInterface
{
    private static $instances = [];

    public static function getInstance()
    {
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function setData($key, $value)
    {
        $this->storage[$key] = $value;
    }

    public function getData($key)
    {
        return $this->storage[$key] ?? null;
    }

    public function getAll()
    {
        return $this->storage;
    }

    abstract public function save();

    abstract public function load();
}
