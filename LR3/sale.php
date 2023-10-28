<?php
require_once __DIR__ . '/src/functions/functions.php';
checkAuth();
require 'connect.php';

require_once './src/actions/logic.php';

require './templateСomponents/header.php';

$user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

$stmt = $mysql->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(\PDO::FETCH_ASSOC);
?>

<main class="main p-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                Фильтрация результата поиска
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                По цене:
            </div>
            <form action="" name="format" method="get">
                <div class="col-12 d-flex justify-content-center align-items-center mb-2">
                    <input type="text" class="search-field form-control" name="POST_priceBottom"
                           placeholder="Цена от"
                           value="<?php echo $POST_priceBottom ?>">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mb-2">
                    <input type="text" class="search-field form-control" name="POST_priceTop" placeholder="Цена до"
                           value="<?php echo $POST_priceTop ?>">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mb-2">
                    Фильтрация по автору:
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <select class="form-select" name="POST_author" id="select-box">
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
                <div class="col-12 d-flex justify-content-center align-items-center mb-2">
                    Фильтрация по описанию:
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <input type="text" class="form-control" name="POST_description"
                           placeholder="Введите описание книги"
                           value="<?php echo $POST_description ?>">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mb-2">
                    Фильтрация по наименованию:
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mb-5">
                    <select name="POST_nameBook" class="form-select">
                        <option value=0>Выберите наименование</option>
                        <?php
                        foreach ($booksList as $row) {
                            ?>
                            <option value='<?php echo $row['name_book'] ?>' <?php if ($row['name_book'] == $POST_nameBook) {
                                echo 'selected';
                            } ?>>
                                <?php echo $row['name_book'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <input type="submit" class="btn btn-primary me-5" value="Поиск" name="get_me">
                    <input type="submit" class="btn btn-danger" value="Очистить" name="clear">
                </div>
            </form>
        </div>
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
    </div>
</main>

<?php
require './templateСomponents/footer.html'
?>

