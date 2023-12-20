<?php

$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/Sites/LR5/';

$types = [
    'application/vnd.ms-excel',
];
var_dump($_SERVER["REQUEST_METHOD"], $_FILES);
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_FILES) {

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir);
    }

    $file = array_shift($_FILES);
    if (in_array($file['type'], $types)) {
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $file['name'])) {
            echo "<a href='/Sites/LR5/{$file['name']}' download='{$file['name']}' class='color-link-ex'>Ссылка на скачивание файла</a>";
        } else {
            echo 'Файл не был загружен';
        }
    } else {
        echo 'Неверный тип обрабатываемого файла';
    }
}
