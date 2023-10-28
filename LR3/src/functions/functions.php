<?php

session_start();

function redirect($path)
{
    header("Location: $path");
    die();
}

function addValidationError($fieldName, $message)
{
//    $_POST['validation'][$fieldName] = $message;
    $_SESSION['validation'][$fieldName] = $message;
}

function maybeHasError($fieldName)
{
//    echo isset($_POST['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
    echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function getErrorMessage($fieldName)
{
//    echo isset($_POST['validation'][$fieldName]) ? $_POST['validation'][$fieldName] : '';
    echo isset($_SESSION['validation'][$fieldName]) ? $_SESSION['validation'][$fieldName] : '';
}

function addOldValue($key, $value)
{
//  echo $_POST['old'][$key] = $value;
    echo $_SESSION['old'][$key] = $value;
}

function getOldValue($key)
{
//    $value = isset($_POST['old'][$key]) ? $_POST['old'][$key] : '';
//    return $value;
    $value = isset($_SESSION['old'][$key]) ? $_SESSION['old'][$key] : '';
    unset($_SESSION['old'][$key]);
    echo $value;
}

function setMessageLogin($key, $message)
{
//    $_POST['message'][$key] = $message;
    $_SESSION['message'][$key] = $message;
}

function hasMessageLogin($key)
{
//    return isset($_POST['message'][$key]);
    return isset($_SESSION['message'][$key]);
}

function getMessageLogin($key)
{
//    $message = isset($_POST['message'][$key]) ? $_POST['message'][$key] : '';
//    unset($_POST['message'][$key]);
//    return $message;
    $message = isset($_SESSION['message'][$key]) ? $_SESSION['message'][$key] : '';
    unset($_SESSION['message'][$key]);
    return $message;
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
    $_SESSION['validation'] = [];
}
