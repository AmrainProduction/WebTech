<?php

$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_name = 'books';

//подключение к бд

try {
    $mysql = new PDO("mysql::host=$DB_HOST;dbname=$DB_name", $DB_USER, $DB_PASSWORD);
} catch (PDOException $exception) {
    echo($exception->getMessage());
}
