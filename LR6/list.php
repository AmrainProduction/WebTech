<?php

require_once './src/actions/logic.php';

require './templateСomponents/header.php';

?>
    <main class="main main-text p-10">
        <div class="container-fluid">
            <div class="col-12 wrapper-btn-Ex-Im">
                <h1>Список книг</h1>
            </div>
        </div>
        <div class="col-mb-4 d-flex justify-content-start align-items-center book-item">
            <a href="addList.php" type='button' class='btn btn-primary'>Добавить</a>
        </div>
        <div class="row d-block">
            <div class="col-mb-12 mt-5 d-flex justify-content-between align-items-center">
                <div class="col-mb-4 d-flex justify-content-center align-items-center book-item">id</div>
                <div class="col-mb-4 d-flex justify-content-center align-items-center book-item">Изображение</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Наименование</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Автор</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Описание</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Цена</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"></div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"></div>
            </div>

            <hr>
        </div>
        <div class="row d-block">
            <?php
            foreach ($tableData as $row) {
                ?>
                <div class="col-mb-12 d-flex justify-content-between align-items-start wrapper-card-book mb-3">
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['id']; ?></div>
                    <div class="col-mb-4 d-flex justify-content-center align-items-center book-image">
                        <img src="assets/img/Books/<?php echo $row['preview']; ?>" alt="/">
                    </div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['name'] . " " . $row['surname']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['name_book']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-start book-item-description"><?php echo $row['description']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['price']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">
                        <a href="edit_loan.php?id=<?=$row['id']?>" type='submit' class='btn btn-primary' id="submit">Редактировать</a>
                    </div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">
                        <form method="post" action="">
                            <button type='submit' class='btn btn-danger' id="submit" value="<?=$row['id']?>" name="delete">Удалить</button>
                        </form>
                    </div>
                </div>
                <hr>
                <?php
            }
            ?>
        </div>
    </main>
<?php
require './templateСomponents/footer.html'
?>