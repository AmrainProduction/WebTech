<?php

require_once __DIR__ . '/../src/functions/functions.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Chitai-gorod</title>
</head>
<body>

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
                        <img src="./assets/img/logo.svg" alt="logo" class="header-logo">
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
            <div class="col-md-3 d-block align-items-center">
                <div class="row">
                    <div href="/" class="col-auto">
                        <?php checkGuestHeaderState(); ?>
                    </div>
                </div>
                <?php checkAuthHeaderState(); ?>
            </div>
        </div>
    </div>
</div>
<div class="wrapper-header-bottom">
    <div class="header-bottom d-flex justify-content-between align-items-center">
        <a href="./index.php" class="col-md-1 d-flex justify-content-center align-items-center">Акции</a>
        <a href="./sale.php" class="col-md-1 d-flex justify-content-center align-items-center">Распродажа</a>
        <a href="./index.php" class="col-md-1 d-flex justify-content-center align-items-center header-special-btn">
            <i class="fa-regular fa-bell" style="color: #ffffff;"></i>
            <div class="title-special-btn">Школа-2023</div>
        </a>
        <a href="./text.php" class="col-md-2 d-flex justify-content-center align-items-center">Комиксы и манга</a>
        <a href="./index.php" class="col-md-1 d-flex justify-content-center align-items-center">Подробки</a>
        <a href="./index.php" class="col-md-1 d-flex justify-content-center align-items-center">Читай-журнал</a>
        <a href="./index.php" class="col-md-2 d-flex justify-content-center align-items-center">Книжные циклы</a>
    </div>
</div>