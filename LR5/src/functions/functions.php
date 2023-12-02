<?php

session_start();

function redirect($path)
{
    header("Location: $path");
    die();
}

function addValidationError($fieldName, $message)
{
    $GLOBALS['validation'][$fieldName] = $message;
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
    echo isset($GLOBALS['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function getErrorMessage($fieldName)
{
    echo isset($GLOBALS['validation'][$fieldName]) ? $GLOBALS['validation'][$fieldName] : '';
}

function setMessageLogin($key, $message)
{
    $GLOBALS['message'][$key] = $message;
}

function hasMessageLogin($key)
{
    return isset($GLOBALS['message'][$key]);
}

function getMessageLogin($key)
{
    return isset($GLOBALS['message'][$key]) ? $GLOBALS['message'][$key] : '';
}

function logout()
{
    unset($_SESSION['user']['id']);
    redirect('../../login.php');
}

function checkAuth()
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/sites/LR4/login.php');
    }
}

function checkGuest()
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/sites/LR4/index.php');
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
    $GLOBALS['validation'] = [];
}