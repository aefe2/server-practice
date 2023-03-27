<div class="form">
    <div class="register-form">
        <h3>Регистрация нового пользователя</h3>
        <form method="post">
            <label for="first-name">Имя</label>
            <input type="text" name="name" id="first-name">
            <label for="login">Логин</label>
            <input type="text" name="login" id="login">
            <label for="password">Пароль</label>
            <input id="password" name="password" type="password">
            <input type="submit" value="Зарегестрироваться">
        </form>
    </div>
    <h3><?= $message ?? ''; ?></h3>
</div>
