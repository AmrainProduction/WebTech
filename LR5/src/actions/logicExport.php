<?php

require_once __DIR__ . '/../../connect.php';

if (isset($_POST['export'])) {
// Выполнение запроса к базе данных для получения данных
    $query = "SELECT * FROM BOOKS";

    try {
        $statement = $mysql->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Ошибка выполнения запроса: ' . $e->getMessage());
    }

// Создание файла CSV и запись данных в него
    $csvFile = fopen('BOOKS_exported.csv', 'w');
    fprintf($csvFile, chr(0xEF) . chr(0xBB) . chr(0xBF));
    foreach ($result as $row) {
        fputcsv($csvFile, $row);
    }
    fclose($csvFile);

    return $resExport = 'BOOKS_exported.csv передан скрипту logicExport.php по протоколу HTTP методом POST. Ссылка для скачивания <a href="BOOKS_exported.csv" class="color-link-ex">Скачать файл</a>';
} else {
    return $resExport = '';
}
?>