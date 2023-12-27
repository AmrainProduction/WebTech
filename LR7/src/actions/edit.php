<?php
require_once 'helpers.php';
require_once 'booksActions.php';

$upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/Sites/LR7/assets/img/Books/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    validation();
    if (ValidationsErrors::get()) return;

    $photo_name = null;
    if ($_FILES['picture']['error'] != 4) {
        $photo_name = $_FILES['picture']['name'];
        move_uploaded_file($_FILES['picture']['tmp_name'], $upload_dir . $photo_name);
    }

    BooksActions::update_book(
        $_POST['id'],
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
    if (!is_numeric($_POST['price']) || (int)$_POST['price'] < 0) ValidationsErrors::add('Неверная цена');

    if (!is_numeric($_POST['author']) || (int)$_POST['author'] < 1) ValidationsErrors::add('Неверный автор');

    if (!$_FILES['picture']['error'] && explode('/', $_FILES['picture']['type'])[0] !== 'image') ValidationsErrors::add('Неверный формат изображения');
}
