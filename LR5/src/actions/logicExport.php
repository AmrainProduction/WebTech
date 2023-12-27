<?php

require_once __DIR__ . '/../../connect.php';

$sql = "SELECT * FROM BOOKS";
$stmt = $mysql->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['export']) && isset($_POST['path_to_save'])) {

    $pathToSave = $_POST['path_to_save'];

    // Защита от перехода в родительскую директорию
    $pathToSave = ltrim($pathToSave, '/');

    // Проверка наличия символов ".."
    if (str_contains($pathToSave, '..')) {
        die('Ошибка: Попытка навигации в родительскую директорию.');
    }

    // Путь для сохранения файла JSON
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/Sites/LR5/' . $pathToSave;

    // Создание файла CSV и запись данных в него
    $csvFile = fopen("$pathToSave", 'w');
    fprintf($csvFile, chr(0xEF) . chr(0xBB) . chr(0xBF)); // Эта строка добавляет в начало файла CSV последовательность байтов (0xEF, 0xBB, 0xBF), которая является сигнатурой кодировки UTF-8 с маркером порядка байтов (BOM). BOM (Byte Order Mark) используется для указания порядка байтов в текстовом файле и помогает правильно интерпретировать файл в кодировке UTF-8.
    foreach ($data as $row) {
        fputcsv($csvFile, $row);
    }
    fclose($csvFile);

    // Send the CSV file to worker.php

    // Установка URL для отправки POST-запроса
    $url = 'http://localhost/Sites/LR5/worker.php';

    // Инициализация сеанса cURL с указанным URL
    $curl = curl_init($url);

    // Установка опций запроса cURL, CURLOPT_POST устанавливает тип запроса POST
    curl_setopt($curl, CURLOPT_POST, true);

    // Устанавливает данные для отправки POST-запроса
    // В данном случае отправляется файл с данными, указанным в переменной $filePath
    // Тип файла устанавливается как application/vnd.ms-excel
    curl_setopt($curl, CURLOPT_POSTFIELDS, [
        'file' => new CURLFile($filePath, 'application/vnd.ms-excel', $pathToSave)
    ]);

    // Устанавливает значение true, чтобы вернуть результат выполнения запроса в виде строки
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Выполняет запрос cURL и возвращает результат выполнения в виде строки
    $response = curl_exec($curl);
    print_r($response); // Вывод результата запроса

    // Проверка на ошибку выполнения запроса
    if ($response === false) {
        throw new Exception("Ошибка отправки файла скрипту worker.php");
    }

    // Завершение сеанса cURL
    curl_close($curl);
} else {
    return $resExport = '';
}
?>
