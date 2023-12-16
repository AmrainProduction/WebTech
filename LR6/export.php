<?php

require_once './src/actions/logic.php';

require_once './src/actions/logicExport.php';

require './templateСomponents/header.php';
?>
    <main class="main main-text p-10">
        <form action="export.php" method="post">
            <div class="col-12 mb-2">Экспорт таблицы BOOKS в формате CSV</div>
            <div class="col-12 mb-2"><?php echo !empty($resExport) ? $resExport : '';?></div>
            <div class="col-12 d-flex justify-content-start align-items-center mb-2">
                <input type="text" class="search-field form-control" name="path_to_save" placeholder="/LR5/exported.csv" value="">
            </div>
            <div class="col-12 d-flex justify-content-start align-items-center">
                <input type="submit" class="btn btn-primary me-5" value="Сохранить" name="export">
            </div>
        </form>

        <div class="row d-block">
            <div class="col-mb-12 mt-5 d-flex justify-content-between align-items-center">
                <div class="col-mb-4 d-flex justify-content-center align-items-center book-item">Изображение</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Наименование</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Автор</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Описание</div>
                <div class="col-mb-2 d-flex justify-content-center align-items-center book-item">Цена</div>
            </div>

            <hr>
        </div>
        <div class="row d-block">
            <?php
            foreach ($tableData as $row) {
                ?>
                <div class="col-mb-12 d-flex justify-content-between align-items-start wrapper-card-book mb-3">
                    <div class="col-mb-4 d-flex justify-content-center align-items-center book-image">
                        <img src="assets/img/Books/<?php echo $row['preview']; ?>" alt="/">
                    </div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['name'] . " " . $row['surname']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['name_book']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-start book-item-description"><?php echo $row['description']; ?></div>
                    <div class="col-mb-2 d-flex justify-content-center align-items-center book-item"><?php echo $row['price']; ?></div>
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