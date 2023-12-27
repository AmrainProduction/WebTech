<?php

require_once './src/actions/logic.php';

require_once './src/actions/booksActions.php';
require_once './src/actions/edit.php';



$author = booksActions::get_authors();
$errors = ValidationsErrors::get();

$book = null;
if (isset($_GET['id'])) {
    $book = BooksTable::get_book_by_id($_GET['id']);
}

require './templateСomponents/header.php';
?>
    <main class="main main-text p-10">
        <div class="container-fluid">
            <div class="col-12 wrapper-btn-Ex-Im">
                <h1>Изменить книгу</h1>
            </div>
        </div>
        <?php if ($errors):?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <?=$error?><br>
                <?php endforeach?>
            </div>
        <?php endif?>
        <form action="editList.php" method="post" enctype="multipart/form-data">
            <div class="row d-flex">
                <div class="col-12 mt-5 d-flex">
                    <input type="hidden" name="id" value="<?=$_GET['id'] ?? $_POST['id'] ?? null?>">
                    <div class="col-2 me-3">
                        <input type="file" name="picture" class="form-control">
                    </div>
                    <div class="col-2 me-3">
                        <input class="form-control" type="text" name="name" value="<?=htmlspecialchars($book['name_book'] ?? $_POST['name_book'] ?? '')?>" placeholder="Name Book:">
                    </div>
                    <div class="col-2 me-3">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <select class="form-select"name="author">
                                <?php foreach ($author as $row):?>
                                    <option value="<?=$row['id']?>" <?php if (($book && $row['id'] == $book['id_author']) || isset($_POST['author']) && $row['id'] == $_POST['author']) echo 'selected'?>><?=htmlspecialchars($row['name'] . " " . $row['surname'])?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 me-3">
                        <textarea class="form-control" id="description" name="description" placeholder="Введите описание книги" rows="1"><?=htmlspecialchars($book['description'] ?? $_POST['description'] ?? '')?></textarea>
                    </div>
                    <div class="col-2 me-3">
                        <input class="form-control" type="text" id="price" name="price" value="<?=htmlspecialchars($book['price'] ?? $_POST['price'] ?? '')?>" placeholder="Price:">
                    </div>
                    <div class="col-2">
<!--                        <input type="submit" class="btn btn-primary me-5" value="Добавить" name="add_in_list">-->
                            <button class="btn btn-primary me-5" type="submit">Сохранить</button>
                    </div>
                </div>
            </div>
        </form>




    </main>
<?php
require './templateСomponents/footer.html'
?>