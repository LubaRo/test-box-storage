<?php

namespace Box;

class FileBox extends AbstractBox
{
    private static $filePath = 'data.json';

    public function save()
    {
        $preparedData = json_encode($this->storage);
        file_put_contents(self::$filePath, $preparedData);
    }

    public function load()
    {
        $fileData = file_get_contents(self::$filePath);
        $this->storage = json_decode($fileData, true);
    }
}
