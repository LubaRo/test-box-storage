<?php

namespace Box;

/**
 * Box storage abstract class
 */
abstract class AbstractBox implements BoxInterface
{
    use Singleton;

    protected $storage = [];

    /**
     * Get value by key from box
     *
     * @param  mixed $key
     * @return mixed
     */
    public function getData($key)
    {
        return $this->storage[$key] ?? null;
    }

    /**
     * Get full data from box
     *
     * @return array
     */
    public function getAll()
    {
        return $this->storage;
    }

    /**
     * Save box data into storage
     *
     * @return void
     */
    abstract public function save();

    /**
     * Load data from storage into box instance
     *
     * @return void
     */
    abstract public function load();
}
