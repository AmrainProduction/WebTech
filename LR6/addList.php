<?php

require_once './src/actions/logic.php';

require_once './src/actions/addListLogic.php';

require './templateСomponents/header.php';

?>
    <main class="main main-text p-10">
        <div class="container-fluid">
            <div class="col-12 wrapper-btn-Ex-Im">
                <h1>Список книг</h1>
            </div>
        </div>
        <form action="addList.php" method="post" enctype="multipart/form-data">
            <div class="row d-flex">
                <div class="col-12 mt-5 d-flex">
                    <div class="col-2 me-3">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="col-2 me-3">
                        <input class="form-control" type="text" id="name" name="name" placeholder="Name Book:">
                    </div>
                    <div class="col-2 me-3">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <select class="form-select" name="author" id="select-box">
                                <option value=0>Выберите автора</option>
                                <?php
                                foreach ($authorsList as $row) {
                                    ?>
                                    <option value='<?php echo $row['id'] ?>' <?php if ($row['id'] == $POST_author) {
                                        echo 'selected';
                                    } ?>>
                                        <?php echo $row['surname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 me-3">
                        <textarea class="form-control" id="description" name="description" placeholder="Введите описание книги" rows="1"></textarea>
                    </div>
                    <div class="col-2 me-3">
                        <input class="form-control" type="text" id="price" name="price" placeholder="Price:">
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