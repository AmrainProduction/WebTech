<?php

require_once __DIR__ . '/../functions/functions.php';

require_once __DIR__ . '/../../connect.php';

$_POST['validation'] = [];

//валидация полей

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || !filter_var($_POST['name'], FILTER_SANITIZE_STRING)) {
        addValidationError('name', 'Wrong name!!!');
    }

    if (empty($_POST['surname']) || !filter_var($_POST['surname'], FILTER_SANITIZE_STRING)) {
        addValidationError('surname', 'Wrong surname!!!');
    }

    if (empty($_POST['patronymic']) || !filter_var($_POST['patronymic'], FILTER_SANITIZE_STRING)) {
        addValidationError('patronymic', 'Wrong patronymic!!!');
    }

    if (empty($_POST['date_birth']) || !filter_var($_POST['date_birth'], FILTER_SANITIZE_STRING)) {
        addValidationError('date_birth', 'Wrong date birth!!!');
    }

    if (empty($_POST['interests']) || !filter_var($_POST['interests'], FILTER_SANITIZE_STRING)) {
        addValidationError('interests', 'Wrong interests!!!');
    }

    if (empty($_POST['address']) || !filter_var($_POST['address'], FILTER_SANITIZE_STRING)) {
        addValidationError('address', 'Wrong address!!!');
    }

    if (empty($_POST['link_vkontakte']) || !filter_var($_POST['link_vkontakte'], FILTER_SANITIZE_URL)) {
        addValidationError('link_vkontakte', 'Wrong blood type!!!');
    }

    if (empty($_POST['blood_type']) || !filter_var($_POST['blood_type'], FILTER_SANITIZE_STRING)) {
        addValidationError('rh_factor', 'Wrong rh factor!!!');
    }

    if (empty($_POST['rh_factor']) || !filter_var($_POST['rh_factor'], FILTER_SANITIZE_STRING)) {
        addValidationError('rh_factor', 'Wrong link!!!');
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        addValidationError('email', 'Wrong email!!!');
    }

    if (!addValidatePassword($_POST['password'])) {
        addValidationError('password', 'Wrong password!!!');
    }

    if ($_POST['password'] !== $_POST['passwordConfirm']) {
        addValidationError('password', 'Passwords are not equal!!!');
    }

//проверка сессия на наличие ошибок и редирект при их наличии
    if (!empty($_POST['validation'])) {
        //сохраняем данные в полях

        addOldValue('name', $_POST['name']);
        addOldValue('surname', $_POST['surname']);
        addOldValue('patronymic', $_POST['patronymic']);
        addOldValue('date_birth', $_POST['date_birth']);
        addOldValue('interests', $_POST['interests']);
        addOldValue('address', $_POST['address']);
        addOldValue('link_vkontakte', $_POST['link_vkontakte']);
        addOldValue('blood_type', $_POST['blood_type']);
        addOldValue('rh_factor', $_POST['rh_factor']);
        addOldValue('email', $_POST['email']);
    }
    else {
        $POST_QUERY = "INSERT INTO users (name, surname, patronymic, email, password, date_birth, gender, interests, address, link_vkontakte, blood_type, rh_factor) VALUES (:name, :surname, :patronymic, :email, :password, :date_birth, :gender, :interests, :address, :link_vkontakte, :blood_type, :rh_factor)";

        $params = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'patronymic' => $_POST['patronymic'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'date_birth' => $_POST['date_birth'],
            'gender' => $_POST['gender'],
            'interests' => $_POST['interests'],
            'address' => $_POST['address'],
            'link_vkontakte' => $_POST['link_vkontakte'],
            'blood_type' => $_POST['blood_type'],
            'rh_factor' => $_POST['rh_factor'],

        ];

        $stmt = $mysql->prepare($POST_QUERY);

        try {
            $stmt->execute($params);
            redirect('login.php');
        } catch (\Exception $e) {
            redirect('login.php');
            die($e->getMessage());
        }
    }
}


