<?php

require_once __DIR__ . '/src/functions/functions.php';

require './templateСomponents/header.php';

checkGuest();

?>

<div class="container-fluid d-flex justify-content-center align-items-start wrapper-login">
    <div class="m-4 registration-box">
        <h3 class="col-12 d-flex justify-content-center align-items-start p-3">Registration</h3>
        <div class="col-12 ps-5 pe-5 pb-5">
            <form class="w-100" action="src/actions/registr.php" method="post">
                <div class="col-12 d-flex">
                    <label for="name" class="mb-3 me-3 w-100">
                        <div class="pb-1">Enter your name:</div>
                        <input <?php maybeHasError('name'); ?> value="<?php htmlspecialchars(getOldValue('name')); ?>" class="form-control" type="text" name="name" placeholder="name"
                               aria-label="name">

                        <small style="color: red"><?php getErrorMessage('name'); ?></small>
                    </label>

                    <label for="surname" class="mb-3 w-100">
                        <div class="pb-1">Enter your surname:</div>
                        <input <?php maybeHasError('surname'); ?> value="<?php htmlspecialchars(getOldValue('surname')); ?>" class="form-control" type="text" name="surname" placeholder="surname"
                               aria-label="surname">
                        <small style="color: red"><?php getErrorMessage('surname'); ?></small>
                    </label>
                </div>

                <div class="col-12 d-flex">
                    <label for="patronymic" class="mb-3 me-3 w-100">
                        <div class="pb-1">Enter your patronymic:</div>
                        <input <?php maybeHasError('patronymic'); ?> value="<?php htmlspecialchars(getOldValue('patronymic')); ?>" class="form-control" type="text" name="patronymic" placeholder="patronymic"
                               aria-label="patronymic">
                        <small style="color: red"><?php getErrorMessage('patronymic'); ?></small>
                    </label>

                    <label for="date_birth" class="mb-3 w-100">
                        <div class="pb-1">Enter your date birth:</div>
                        <input <?php maybeHasError('date_birth'); ?> value="<?php htmlspecialchars(getOldValue('date_birth')); ?>" class="form-control" type="date" name="date_birth" placeholder="date birth"
                               aria-label="date_birth">
                        <small style="color: red"><?php getErrorMessage('date_birth'); ?></small>
                    </label>
                </div>

                <label for="interests" class="mb-3 w-100">
                    <div class="pb-1">Enter your interests:</div>
                    <textarea <?php maybeHasError('interests'); ?> name="interests" class="interests-textarea" placeholder="your interests"
                              rows="5"><?php htmlspecialchars(getOldValue('interests')); ?></textarea>
                    <small style="color: red"><?php getErrorMessage('interests'); ?></small>
                </label>

                <div class="col-12 d-flex">
                    <label for="address" class="mb-3 me-3 w-100">
                        <div class="pb-1">Enter your address:</div>
                        <input <?php maybeHasError('address'); ?> value="<?php htmlspecialchars(getOldValue('address')); ?>" class="form-control" type="text" name="address" placeholder="address"
                               aria-label="address">
                        <small style="color: red"><?php getErrorMessage('address'); ?></small>
                    </label>

                    <label for="gender" class="mb-3 w-100">
                        <div class="pb-1">Choose your gender:</div>
                        <select <?php maybeHasError('gender'); ?> class="form-control" name="gender" id="gender">
                            <option value="1">Choose your gender</option>
                            <option value="1">male</option>
                            <option value="1">female</option>
                        </select>
                        <small style="color: red"><?php getErrorMessage('gender'); ?></small>
                    </label>
                </div>

                <div class="col-12 d-flex">
                    <label for="link_vkontakte" class="mb-3 me-3 w-100">
                        <div class="pb-1">Enter your VK:</div>
                        <input <?php maybeHasError('link_vkontakte'); ?> value="<?php htmlspecialchars(getOldValue('link_vkontakte')); ?>" class="form-control" type="text" name="link_vkontakte" placeholder="Enter your VK"
                               aria-label="link_vkontakte">
                        <small style="color: red"><?php getErrorMessage('link_vkontakte'); ?></small>
                    </label>

                    <label for="blood_type" class="mb-3 me-3 w-100">
                        <div class="pb-1">Enter your blood type:</div>
                        <input <?php maybeHasError('blood_type'); ?> value="<?php htmlspecialchars(getOldValue('blood_type')); ?>" class="form-control" type="text" name="blood_type" placeholder="blood type"
                               aria-label="blood_type">
                        <small style="color: red"><?php getErrorMessage('blood_type'); ?></small>
                    </label>

                    <label for="rh_factor" class="mb-3 w-100">
                        <div class="pb-1">Enter your rh factor:</div>
                        <input <?php maybeHasError('rh_factor'); ?> value="<?php htmlspecialchars(getOldValue('rh_factor')); ?>" class="form-control" type="text" name="rh_factor" placeholder="rh factor"
                               aria-label="rh_factor">
                        <small style="color: red"><?php getErrorMessage('rh_factor'); ?></small>
                    </label>
                </div>

                <label for="email" class="mb-3 w-100">
                    <div class="pb-1">Enter your email:</div>
                    <input <?php maybeHasError('email'); ?> value="<?php htmlspecialchars(getOldValue('email')); ?>" class="form-control" type="text" name="email" placeholder="email"
                           aria-label="email">
                    <small style="color: red"><?php getErrorMessage('email'); ?></small>
                </label>

                <label for="password" class="w-100 mb-3">
                    <div class="pb-1">Enter your password:</div>
                    <input <?php maybeHasError('password'); ?> class="form-control" type="password" name="password" placeholder="password"
                           aria-label="password">
                    <small style="color: red"><?php getErrorMessage('password'); ?></small>
                </label>

                <label for="passwordConfirm" class="w-100 mb-3">
                    <div class="pb-1">Repeat your password:</div>
                    <input <?php maybeHasError('passwordConfirm'); ?> class="form-control" type="password" name="passwordConfirm" placeholder="password"
                           aria-label="passwordConfirm">
                    <small style="color: red"><?php getErrorMessage('passwordConfirm'); ?></small>
                </label>

                <div class="col-12 d-flex justify-content-center">
                    <a href="./login.php" class="btn-login me-3 w-100 d-flex justify-content-center align-items-center">Уже есть аккаунт</a>
                    <input type="submit" class="btn-login w-100" value="Зарегистрироваться" name="registration">
                </div>
            </form>
            <?php clearValidation(); ?>
        </div>
    </div>
</div>

<?php
require './templateСomponents/footer.html'
?>
