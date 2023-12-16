<?php
require_once __DIR__ . '/../../connect.php';

//require_once __DIR__ . '/../functions/functions.php';


if (isset($_POST['add_in_list'])) {
    $file = $_POST['file'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $dir = '/LR6/' . basename($_FILES['file']['name']);
        move_uploaded_file($file_tmp, $dir);
    }

    // Защита от SQL-инъекций
    $query = "INSERT INTO books (preview, name_book, id_author, description, price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysql->prepare($query);
    $stmt->execute([$_FILES["file"]["name"], $name, $author, $description, $price]);

}


?>