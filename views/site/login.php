<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <div class="form">
        <div class="login-form">
            <label><?= $message ?? ''; ?></label>
            <h3>Авторизация</h3>
            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label for="login">Логин</label>
                <input name="login" type="text" id="login">
                <label for="password">Пароль</label>
                <input name="password" id="password" type="password">
                <input type="submit" value="Войти">
            </form>
        </div>
    </div>
<?php endif;
