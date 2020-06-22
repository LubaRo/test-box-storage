<?php

namespace Box;

/**
 * Box storage abstract class
 */
abstract class AbstractBox implements BoxInterface
{
    /**
     * Box storage instances
     *
     * @var array
     */
    private static $instances = [];

    /**
     * Create or retrieve the instance of needed class
     *
     * @return Box
     */
    public static function getInstance()
    {
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }

    /**
     * Disable instantiation.
     */
    private function __construct()
    {
    }

    /**
     * Disable the cloning of this class.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Disable the wakeup of this class.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

    /**
     * Set data into box
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     */
    public function setData($key, $value)
    {
        $this->storage[$key] = $value;
    }

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
