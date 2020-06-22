<?php

namespace Box;

/**
 * Singleton trait
 */

trait Singleton
{
    /**
     * Singleton instances
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
}
