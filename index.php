<?php

require_once __DIR__ . "/vendor/autoload.php";

use Box\DbBox;
use Box\FileBox;

// Prepare test data
$testData = [
    'key1' => 'content1',
    'key2' => 'content2',
    'key3' => 'content3'
];

/*
    Test FileBox class
*/
$file = FileBox::getInstance();
$file2 = FileBox::getInstance();

if ($file !== $file2) {
    echo "FIXME: there are different storages!";
} else {
    echo "Storages are equal.";
}

foreach ($testData as $key => $value) {
    $file->setData($key, $value);
}
$file->save();

/* Add new key to check that we don't override existing data */
$file->setData('new', 'new data');
$testData['new'] = 'new data';

$file->save();
$file->load();
$fileData = $file->getAll();

if ($testData == $fileData) {
    echo "Saved data is equal loaded data(:\n\n";
} else {
    echo "Smth went wrong...\n\n";
}
unset($testData['new']);

/*
    Test DbBox class
*/
$db = DbBox::getInstance();
$db2 = DbBox::getInstance();

if ($db !== $db2) {
    echo "FIXME: there are different storages!";
} else {
    echo "Storages are equal.";
}
foreach ($testData as $key => $value) {
    $db->setData($key, $value);
}
$db->save();

/* Add new key to check that we don't override existing data */
$db->setData('new', 'new data');
$testData['new'] = 'new data';
$db->save();

$db->load();
$dbData = $db->getAll();

if ($dbData == $testData) {
    echo "Saved data is equal loaded data(:\n\n";
} else {
    echo "Smth went wrong...\n\n";
}
unset($testData['new']);

if ($db === $file) {
    echo "Db and file are equal..";
}

var_dump($db instanceof FileBox);
