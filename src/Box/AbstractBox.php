<?php

namespace App\Box;

abstract class AbstractBox extends Box
{
    protected $storage = [];

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
