<?php

use App\Database;

[
    'dbname' => $db,
    'host' => $host,
    'user' => $user,
    'password' => $password
] = require('config.php');

Database::connect($db, $host, $user, $password);
