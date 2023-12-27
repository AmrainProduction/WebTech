<?php

require_once 'booksActions.php';
require_once 'helpers.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    var_dump($_GET['id']);

    BooksActions::delete_book($book_id);
    redirect($_SERVER['HTTP_REFERER']);
}
