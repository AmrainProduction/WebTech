<?php

require_once __DIR__ . '/../../connect.php';
require_once __DIR__ . '/../functions/functions.php';

if (isset($_POST['import'])) {
    if (!empty($_FILES['file']['tmp_name'])) {

        $file = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];

        // Проверка формата файла
        if ($fileType !== 'text/csv') {
            return $resImport = "Разрешен только формат CSV!";
            exit;
        }

        $hasMismatch = false; // флаг для обозначения наличия строк с несоответствующим количеством столбцов

        $handle = fopen($file, "r");
        $books = array();

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) != 6) {
                    $hasMismatch = true;
                    break; // если найдена строка с неправильным количеством столбцов, завершаем цикл
                } else {
                    $books[] = array(
                        'id' => $data[0],
                        'preview' => $data[1],
                        'name_book' => $data[2],
                        'id_author' => $data[3],
                        'description' => $data[4],
                        'price' => $data[5]
                    );
                }
            }

        }

        $lengthArr = count($books);

        fclose($handle);

        if ($hasMismatch) {
            return $resImport = "Дамп содержит строки с неправильным количеством столбцов (не равным 6)";
        }

        try {
            // Создание новой таблицы
            $mysql->exec("CREATE TABLE IF NOT EXISTS books_imported (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            preview VARCHAR(255),
            name_book VARCHAR(255),
            id_author INT(11),
            description TEXT,
            price DECIMAL(10,2)
        )");

            // Вставка данных из csv файла в таблицу
            foreach ($books as $book) {
                $preview = $mysql->quote($book['preview']);
                $name_book = $mysql->quote($book['name_book']);
                $id_author = (int)$book['id_author'];
                $description = $mysql->quote($book['description']);
                $price = (float)$book['price'];

                // Защита от SQL-инъекций
                $query = "INSERT INTO books_imported (preview, name_book, id_author, description, price) VALUES (?, ?, ?, ?, ?)";
                $stmt = $mysql->prepare($query);
                $stmt->execute([$preview, $name_book, $id_author, $description, $price]);
            }

            // Закрытие соединения с базой данных
            $mysql = null;
            return $resImport = "Файл с данными получен из $file и обработан. Создана таблица books_imported с числом записей $lengthArr.";
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    } else {
        return $resImport = "Файл не выбран!";
    }
}

?>