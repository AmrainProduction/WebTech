<?php
require_once __DIR__ . '/../../connect.php';

require_once __DIR__ . '/../functions/functions.php';


if (isset($_POST['add_in_list'])) {
    $file = $_FILES["picture"]["name"];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $allowedExts = array("jpg", "png");
    $temp = explode(".", $_FILES["picture"]["name"]);
    $extension = end($temp);
    if ((($_FILES["picture"]["type"] == "image/jpeg") || ($_FILES["picture"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
        if ($_FILES["picture"]["error"] > 0) {
            return $resultAdd = "Error: " . $_FILES["picture"]["error"];
        } else {
            $dir = 'C:/xampp/htdocs/Sites/LR6/assets/img/Books/' . basename($_FILES['picture']['name']);
            move_uploaded_file($_FILES['picture']['tmp_name'], $dir);
        }
    } else {
        return $resultAdd = "Invalid file";
    }

    // Защита от SQL-инъекций
    $query = "INSERT INTO books (preview, name_book, id_author, description, price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysql->prepare($query);
    $stmt->execute([$file, $name, $author, $description, $price]);

    // Перенаправление на страницу успешного добавления
    redirect('list.php');
}

?>