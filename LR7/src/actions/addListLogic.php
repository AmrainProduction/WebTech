<?php

require_once 'helpers.php';
require_once 'books_table.php';

$upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/Sites/LR6/assets/img/Books/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    validation();
    if (ValidationsErrors::get()) return;

    $photo_name = $_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $upload_dir . $photo_name);

    BooksTable::create_book(
        $photo_name,
        $_POST['name'],
        (int)$_POST['author'],
        $_POST['description'],
        (int)$_POST['price'],
    );
    redirect('list.php');
}

function validation(): void
{
    if (!trim($_POST['name'])) ValidationsErrors::add('Не задано название');

    if (!trim($_POST['price'])) ValidationsErrors::add('Не задана цена');
    elseif (!is_numeric($_POST['author']) || (int)$_POST['price'] < 0) ValidationsErrors::add('Неверная цена');

    if (!is_numeric($_POST['author']) || (int)$_POST['author'] < 1) ValidationsErrors::add('Неверный автор');

    if ($_FILES['picture']['error']) ValidationsErrors::add('Не выбрано изображение');
    elseif (explode('/', $_FILES['picture']['type'])[0] !== 'image') ValidationsErrors::add('Неверный формат изображения');
}

?>