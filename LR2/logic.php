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

// список книг

$queryBooks = $mysql->query('SELECT books.preview, books.name_book, id_author.surname, id_author.name, books.description, books.price FROM books INNER JOIN id_author ON books.id_author=id_author.id');

$booksList = [];
while ($row = $queryBooks->fetch()) {
    $booksList[] = $row;
}


// список авторов

$queryAuthors = $mysql->query("SELECT id_author.surname, id_author.name FROM id_author");

$authorsList = [];
$count = 1;
while ($row = $queryAuthors->fetch()) {
    $authorsList[$count] = [
        'id' => $count,
        'name' => $row[1],
        'surname' => $row[0],
    ];
    $count++;
//    $authorsList[] = $row;
}


//защита формы от очистки

$POST_nameBook = 0;
if (isset($_GET['POST_nameBook'])) {
    $POST_nameBook = $_GET['POST_nameBook'];
}

$POST_author = 0;
if (isset($_GET['POST_author'])) {
    $POST_author = $_GET['POST_author'];
}

$POST_description = '';
if (isset($_GET['POST_description'])) {
    $POST_description = $_GET['POST_description'];
}

$POST_priceBottom = '';
if (isset($_GET['POST_priceBottom'])) {
    $POST_priceBottom = $_GET['POST_priceBottom'];
}

$POST_priceTop = '';
if (isset($_GET['POST_priceTop'])) {
    $POST_priceTop = $_GET['POST_priceTop'];
}

// полный список книг до фильтра
$query = "SELECT books.preview, books.name_book, id_author.surname, id_author.name, books.description, books.price FROM books INNER JOIN id_author ON books.id_author=id_author.id";
$err = 0;

if (isset($_GET['clear'])) {
    //пустой блок на случай кнопки очистки
    $POST_priceTop = '';
    $POST_priceBottom = '';
    $POST_description = '';
    $POST_author = 0;
    $POST_nameBook = 0;
}

// Фильтрация по наименованию книги SELECT books.preview, books.name_book, id_author.surname, id_author.name, books.description, books.price FROM books INNER JOIN id_author ON books.id_author=id_author.id AND books.description LIKE '%Мастер и Маргарита%';
if (isset($_GET['POST_nameBook'])) {
    if (filter_var($_GET['POST_nameBook'], FILTER_SANITIZE_STRING)) {
        $query .= " AND books.name_book LIKE '%" . $_GET["POST_nameBook"] . "%'";
    }

}

// Фильтрация по автору

if (isset($_GET['POST_author'])) {
    if (filter_var($_GET['POST_author'], FILTER_SANITIZE_STRING)) {
        $query .= " AND id_author.id LIKE '%" . $_GET["POST_author"] . "%'";
    }

}

// Фильтрация по описанию

if (isset($_GET['POST_description'])) {
    if (filter_var($_GET['POST_description'], FILTER_SANITIZE_STRING)) {
        $query .= " AND books.description LIKE '%" . $_GET["POST_description"] . "%'";
    }

}

// Фильтрация по нижней цене

if (isset($_GET["POST_priceBottom"])) {
    if (filter_var($_GET["POST_priceBottom"], FILTER_VALIDATE_INT)) {
        $query .= " AND books.price >= " . $_GET["POST_priceBottom"];
        $err = 0;
    } else {
        //echo "Ошибка, переменная не число<br>";
        $err += 100;
    }
}
// Фильтрация по верхней цене

if (isset($_GET["POST_priceTop"])) {
    if (filter_var($_GET["POST_priceTop"], FILTER_VALIDATE_INT)) {
        $query .= " AND books.price <= " . $_GET["POST_priceTop"];
        $err = 0;
    } else {
        //echo "Ошибка, переменная не число<br>";
        $err += 100;
    }
}

// запись результата в табличку

$result = $mysql->query($query);

$tableData = [];

while ($row = $result->fetch()) {
    $tableData[] = $row;
}

?>