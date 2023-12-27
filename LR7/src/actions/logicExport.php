<?php

require_once __DIR__ . '/../../connect.php';

if (isset($_POST['export']) && isset($_POST['path_to_save'])) {

    $pathToSave = $_POST['path_to_save'];

    // Защита от перехода в родительскую директорию
    $pathToSave = ltrim($pathToSave, '/');

    // Проверка наличия символов ".."
    if (strpos($pathToSave, '..') !== false) {
        die('Ошибка: Попытка навигации в родительскую директорию.');
    }


    // Путь для сохранения файла JSON
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $pathToSave;

// Выполнение запроса к базе данных для получения данных
    $query = "SELECT * FROM BOOKS";

    try {
        $statement = $mysql->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Ошибка выполнения запроса: ' . $e->getMessage());
    }

// Создание файла CSV и запись данных в него
    $uploadUrl = '/LR5/worker.php?file=' . urlencode($pathToSave);
    $csvFile = fopen("$uploadUrl", 'w');
    fprintf($csvFile, chr(0xEF) . chr(0xBB) . chr(0xBF));
    foreach ($result as $row) {
        fputcsv($csvFile, $row);
    }
    fclose($csvFile);

    return $resExport = "BOOKS_exported.csv передан скрипту logicExport.php по протоколу HTTP методом POST. Ссылка для скачивания <a href='$uploadUrl' download='BOOKS_exported.csv' class='color-link-ex'>Скачать файл</a>";
} else {
    return $resExport = '';
}
?>