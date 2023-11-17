<?php

require_once __DIR__ . '/../functions/functions.php';

require_once __DIR__ . '/../../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        addValidationError('email', 'Wrong email!!!');
        setMessageLogin('error', 'Неверный email');
    }

    $stmt = $mysql->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user_log = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$user_log) {
        setMessageLogin('error', 'Пользователь не найден');
    }

    else if (!password_verify($password, $user_log['password'])) {
        setMessageLogin('error', 'Неверный пароль');
    } else {
        $_SESSION['user']['id'] = $user_log['id'];
        $_SESSION['user']['name'] = $user_log['name'];
        $_SESSION['user']['surname'] = $user_log['surname'];

        redirect('index.php');
    }

}


