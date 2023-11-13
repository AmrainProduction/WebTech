<?php

session_start();

function redirect($path)
{
    header("Location: $path");
    die();
}

function addValidationError($fieldName, $message)
{
    $_POST['validation'][$fieldName] = $message;
}

function addValidatePassword($password)
{
    return preg_match(
        '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.{7,})(?=.*[!@#$%^&*()+=\[\]{};\':"|,.<>?])(?=.* +)(?=.*-+)(?=.*_)[^А-Яа-я]*$/',
        $password
    );
}

function maybeHasError($fieldName)
{
    echo isset($_POST['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function getErrorMessage($fieldName)
{
    echo isset($_POST['validation'][$fieldName]) ? $_POST['validation'][$fieldName] : '';
}

function addOldValue($key, $value)
{
    $_POST['old'][$key] = $value;
}

function getOldValue($key)
{
    echo isset($_POST['old'][$key]) ? $_POST['old'][$key] : '';
}

function setMessageLogin($key, $message)
{
    $_POST['message'][$key] = $message;
}

function hasMessageLogin($key)
{
    return isset($_POST['message'][$key]);
}

function getMessageLogin($key)
{
    return isset($_POST['message'][$key]) ? $_POST['message'][$key] : '';
}

function logout()
{
    unset($_SESSION['user']['id']);
    redirect('../../login.php');
}

function checkAuth()
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/sites/LR3/login.php');
    }
}

function checkGuest()
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/sites/LR3/index.php');
    }
}

function checkAuthHeaderState()
{
    if (!isset($_SESSION['user']['id'])) {
        echo "Вы не авторизированы!";
        echo '<div class="row" > 
                    <a href="./login.php" class="col-auto">
                        Войти
                    </a>
                    или
                    <a href="./registration.php" class="col-auto">
                        зарегистрироваться
                    </a>
                </div>
                ';
    }
}

function checkGuestHeaderState()
{
    if (isset($_SESSION['user']['id'])) {
        echo "Вы вошли как" . " " . $_SESSION['user']['name'] . " " . $_SESSION['user']['surname'];
        echo '<form action="src/actions/logout.php" method="post">
                    <button class="warning-login">
                        Выйти!
                    </button>
                </form>';
    }
}

function clearValidation()
{
    $_POST['validation'] = [];
}
