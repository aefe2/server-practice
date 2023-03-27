<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <div class="form">
        <div class="login-form">
            <h3>Авторизация</h3>
            <form method="post">
                <label for="login">Логин</label>
                <input name="login" type="text" id="login">
                <label for="password">Пароль</label>
                <input name="password" id="password" type="password">
                <input type="submit" value="Войти">
            </form>
        </div>
        <h3><?= $message ?? ''; ?></h3>
    </div>
<?php endif;
