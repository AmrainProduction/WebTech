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

$uploadUrl = '/Sites/LR5/worker.php?file=' . urlencode($pathToSave);

return $resExport = "<a href='$uploadUrl' download='$pathToSave' class='color-link-ex'>Скачать файл</a>";
} else {
return $resExport = '';
}
?>
