<?php

require_once '../logic.php';

print_r($query)

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Chitai-gorod</title>
</head>
<body>

<!------------------------------------------------------------------header------------------------------------------------------------------>

<div class="wrapper-header-top">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 d-flex">
                    <div class="col-md-2">
                        <i class="fa-solid fa-location-arrow" style="color: #ffffff;"></i>
                        <a href="/" class="header-location"><strong>Россия, Москва</strong></a>
                    </div>
                    <div class="col-md-2">
                        <a href="/">
                            Адреса магазинов
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="/">
                            Доставка и оплата
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="/">
                            Бонусная программа
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="/">
                            Партнёрская программа
                        </a>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="col-md-8 d-flex justify-content-end">
                        <a href="tel:+84954248444">8 (495) 424-84-44 — круглосуточно</a>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <a href="/">
                            Обратная связь
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper-header-middle sticky-top">
    <div class="row header-middle d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../assets/img/logo.svg" alt="logo" class="header-logo">
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-catalog">
                            <i class="fa-solid fa-book" style="color: #ffffff;"></i>
                            <strong>Каталог</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-control search-form d-flex align-items-center justify-content-center header-form">
                                <input class="search-field" type="search" placeholder="Поиск"
                                       aria-label="Поиск">
                                <button class="btn btn-search d-flex align-items-center justify-content-center"
                                        type="submit">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-between align-items-center">
                <div class="container-fluid">
                    <div class="row">
                        <a href="/" class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="../assets/img/Profile.svg" class="header-icon-btn " alt="profile">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="header-title-btn">Войти</div>
                            </div>
                        </a>
                        <a href="/" class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="../assets/img/Orders.svg" class="header-icon-btn " alt="orders">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="header-title-btn">Заказы</div>
                            </div>
                        </a>
                        <a href="/" class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="../assets/img/Mark.svg" class="header-icon-btn " alt="marks">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="header-title-btn">Закладки</div>
                            </div>
                        </a>
                        <a href="/" class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="../assets/img/Basket.svg" class="header-icon-btn " alt="basket">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="header-title-btn">Корзина</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper-header-bottom">
    <div class="header-bottom d-flex justify-content-between align-items-center">
        <a href="../index.php" class="col-md-1 d-flex justify-content-center align-items-center">Акции</a>
        <a href="sale.php" class="col-md-1 d-flex justify-content-center align-items-center">Распродажа</a>
        <a href="../index.php" class="col-md-1 d-flex justify-content-center align-items-center header-special-btn">
            <i class="fa-regular fa-bell" style="color: #ffffff;"></i>
            <div class="title-special-btn">Школа-2023</div>
        </a>
        <a href="../index.php" class="col-md-2 d-flex justify-content-center align-items-center">Комиксы и манга</a>
        <a href="../index.php" class="col-md-1 d-flex justify-content-center align-items-center">Подробки</a>
        <a href="../index.php" class="col-md-1 d-flex justify-content-center align-items-center">Читай-журнал</a>
        <a href="../index.php" class="col-md-2 d-flex justify-content-center align-items-center">Книжные циклы</a>
    </div>
</div>

<!------------------------------------------------------------------main------------------------------------------------------------------>

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
                            <option value='<?php echo $row['surname'] ?>' <?php if ($row['surname'] == $POST_author) {
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
                    <input type="text" class="form-control" name="POST_description" placeholder="Введите описание книги"
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
                    <input type="submit" class="btn btn-primary me-5" onclick="" value="Поиск" name="get_me">
                    <input type="submit" class="btn btn-danger" onclick="" value="Очистить" name="clear">
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
                        <img src="../assets/img/Books/<?php echo $row['preview']; ?>" alt="/">
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

<footer class="footer d-flex justify-content-center align-items-center">
    footer
</footer>


<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>