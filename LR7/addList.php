<?php

require_once './src/actions/logic.php';

require './src/actions/addListLogic.php';
require_once './src/actions/booksActions.php';

require './templateСomponents/header.php';

$author = booksActions::get_authors();
$errors = ValidationsErrors::get();
?>
    <main class="main main-text p-10">
        <div class="container-fluid">
            <div class="col-12 wrapper-btn-Ex-Im">
                <h1>Список книг</h1>
            </div>
        </div>
        <?php if ($errors):?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <?=$error?><br>
                <?php endforeach?>
            </div>
        <?php endif?>
        <form action="addList.php" method="post" enctype="multipart/form-data">
            <div class="row d-flex">
                <div class="col-12 mt-5 d-flex">
                    <div class="col-2 me-3">
                        <input type="file" name="picture" class="form-control">
                    </div>
                    <div class="col-2 me-3">
                        <input class="form-control" type="text" id="name" name="name" value="<?=htmlspecialchars($_POST['name'] ?? '')?>" placeholder="Name Book:">
                    </div>
                    <div class="col-2 me-3">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <select class="form-select" aria-label="Жанр" name="author" title="Жанр">
                                <?php foreach ($author as $row):?>
                                    <option value="<?=$row['id']?>"><?=htmlspecialchars($row['surname'])?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 me-3">
                        <textarea class="form-control" id="description" name="description" placeholder="Введите описание книги" rows="1"><?=htmlspecialchars($_POST['description'] ?? '')?></textarea>
                    </div>
                    <div class="col-2 me-3">
                        <input class="form-control" type="text" id="price" name="price" value="<?=htmlspecialchars($_POST['price'] ?? '')?>" placeholder="Price:">
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary me-5" value="Добавить" name="add_in_list">
                    </div>
                </div>
            </div>
        </form>




    </main>
<?php
require './templateСomponents/footer.html'
?>