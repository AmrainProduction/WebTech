<?php

require_once __DIR__ . '/src/functions/functions.php';

require_once 'src/actions/signin.php';

require './templateСomponents/header.php';

checkGuest();

?>

<div class="container-fluid d-flex justify-content-center align-items-start wrapper-login">
    <div class="m-4 login-box">
        <h3 class="col-12 d-flex justify-content-center align-items-start p-3">Authorization</h3>
        <div class="col-12 ps-5 pe-5 pb-5">
            <form class="w-100" action="login.php" method="post">

                <?php if (hasMessageLogin('error')): ?>
                    <div class="warning-login"><?php echo getMessageLogin('error')?></div>
                <?php endif; ?>

                <label for="email" class="mb-3 w-100">
                    <div class="pb-1">Enter your email:</div>
                    <input <?php maybeHasError('email'); ?> value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" class="form-control"
                                                            type="text" name="email" placeholder="email"
                                                            aria-label="email">
                    <small style="color: red"><?php getErrorMessage('email'); ?></small>
                </label>

                <label for="password" class="w-100 mb-3">
                    <div class="pb-1">Enter your password:</div>
                    <input class="form-control" type="password" name="password" placeholder="******"
                           aria-label="password">
                </label>

                <div class="col-12 d-flex justify-content-center">
                    <a href="./registration.php "
                       class="btn-login me-3 w-100 d-flex justify-content-center align-items-center">Еще нет
                        аккаунта</a>
                    <input type="submit" class="btn-login w-100" value="Войти" name="registration">
                </div>
            </form>
            <?php clearValidation(); ?>
        </div>
    </div>
</div>


<?php
require './templateСomponents/footer.html'
?>
