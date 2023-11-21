<?php

require_once './src/actions/preset.php';
$preset = isset($_GET['preset']) ? getPreset($_GET['preset']) : '';

include './src/actions/logicTextPage.php';

require './templateСomponents/header.php';
?>

<main class="main main-text p-10">
    <div class="container-fluid">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <form action="" name="textPageArea" method="POST">
                Введите текст:
                <textarea name="POST_text" class="form-control" cols="200"
                          rows="1">
                    <?php
                    if ($preset) {
                        echo $preset;
                    } elseif (isset($_POST['POST_text'])) {
                        echo $_POST['POST_text'];
                    } else {
                        echo '';
                    }
                    ?>
                </textarea>
                <div class="col-12 mt-2 d-flex justify-content-start align-items-center">
                    <input type="submit" class="btn btn-primary me-5" value="Отправить" name="post_data">
                </div>
            </form>
        </div>
        <div class="mt-5 d-flex justify-content-start align-items-center">
            <h1>Ответ:</h1>
        </div>
        <div class="col-12 mt-5 form-control">
            <h4 class="col-12">Задание 3. Вывести только прямую речь (абзацы &ltp&gt, начинающиеся с длинного
                тире).</h4>
            <div class="col-12 mt-1">
                <?php isset($_POST['POST_text']) ? case3($_POST['POST_text']) : ''; ?>
            </div>
        </div>

        <div class="col-12 mt-3 form-control">
            <h4 class="col-12">Задание 9. Удалить лишние пробелы между дефисом в местоимениях и наречиях.</h4>
            <div class="col-12 mt-1">
                <?php isset($_POST['POST_text']) ? case9($_POST['POST_text']) : ''; ?>
            </div>
        </div>

        <div class="col-12 mt-3 form-control">
            <h4 class="col-12">Задание 14. Автоматически сформировать “Указатель ссылок”.</h4>
            <div class="col-12 mt-1 case14">
                <?php isset($_POST['POST_text']) ? $anchorLinks = case14($_POST['POST_text']) : ''; ?>
                <?php echo isset($_POST['POST_text']) ? insertAnchorLinks($_POST['POST_text'], $anchorLinks) : 'Empty'; ?>
            </div>
        </div>

        <div class="col-12 mt-3 form-control">
            <h4 class="col-12">Задание 19. “Чистка форматирования”. Убрать из исходного html все виды визуального
                форматирования, оставить только функциональные и структурные элементы.</h4>
            <div class="col-12 mt-1">
                <?php echo isset($_POST['POST_text']) ? case19($_POST['POST_text']) : ''; ?>
            </div>
        </div>
    </div>
</main>

<?php
require './templateСomponents/footer.html'
?>

