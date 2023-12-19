<?php

$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/Sites/LR5/';

$types = [
    'application/vnd.ms-excel',
];
//var_dump($_FILES);
if ($_SERVER["REQUEST_METHOD"] == "GET" && $_FILES) {

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir);
    }

    $file = array_shift($_FILES);
    if (in_array($file['type'], $types)) {
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $file['name'])) {
            echo "<a href='/Sites/LR5/{$file['name']}' download='{$file['name']}'>Ссылка на скачивание файла</a>";
        } else {
            echo 'Файл не был загружен';
        }
    } else {
        echo 'Неверный тип обрабатываемого файла';
    }
}
