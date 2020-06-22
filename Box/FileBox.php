<?php

namespace Box;

/**
 * FileBox
 *
 * Allows to save and load box data from file
 */
class FileBox extends AbstractBox
{
    /**
     * File path for saving and retrieving data
     *
     * @var string
     */
    private static $filePath = 'data.json';

    /**
     * Save box data into file
     *
     * @return void
     */
    public function save()
    {
        $preparedData = json_encode($this->storage);
        file_put_contents(self::$filePath, $preparedData);
    }

    /**
     * Load data from file into box instance
     *
     * @return void
     */
    public function load()
    {
        $fileData = file_get_contents(self::$filePath);
        $this->storage = json_decode($fileData, true);
    }
}
