<div class="forms">
    <div class="add-doctor-form">
        <h3>Добавить врача</h3>
        <form action="" method="post">
            <label for="doctor-last-name">Фамилия</label>
            <input id="doctor-last-name" type="text" name="last_name">
            <label for="doctor-first-name">Имя</label>
            <input id="doctor-first-name" type="text" name="first_name">
            <label for="doctor-patronymic">Отчество</label>
            <input id="doctor-patronymic" type="text" name="patronymic">
            <label for="doctor-birth-date">Дата рождения</label>
            <input id="doctor-birth-date" type="date" name="date_of_birth">
            <label for="doctor-position">Должность</label>
            <input id="doctor-position" type="text" name="position">
            <label for="doctor-specialization">Специализация</label>
            <?php
            echo '<select id="doctor-specialization">';
            foreach ($specializations as $specialization) {
                echo "<option value=\"$specialization->id_specialization\">" . $specialization->specialization_name . '</option>';
            }

            echo '</select>';
            ?>
            <input type="submit" value="Добавить">
        </form>
    </div>
    <div class="add-patient-form">
        <h3>Добавить пациента</h3>
        <form>
            <label for="patient-first-name">Имя</label>
            <input id="patient-first-name" type="text">
            <label for="patient-last-name">Фамилия</label>
            <input id="patient-last-name" type="text">
            <label for="patient-patronymic">Отчество</label>
            <input id="patient-patronymic" type="text">
            <label for="patient-birth-date">Дата рождения</label>
            <input id="patient-birth-date" type="date">
            <input type="submit" value="Добавить">
        </form>
    </div>
    <div class="patient-record-form">
        <h3>Записать пациента</h3>
        <form>
            <label for="patient-choice">ФИО пациента</label>
            <input id="patient-choice" type="text">
            <label for="record-date">Дата приема</label>
            <input id="record-date" type="date">
            <label for="record-time">Время приема</label>
            <input id="record-time" type="time">
            <input type="submit" value="Добавить">
        </form>
    </div>
    <div class="register-form">
        <h3>Добавление нового пользователя</h3>
        <form action="/server-practice/admin/add-user" method="post">
            <label for="first-name">Имя</label>
            <input type="text" name="name" id="first-name">
            <label for="last-name">Фамилия</label>
            <input type="text" name="last_name" id="last-name">
            <label for="patronymic">Отчество</label>
            <input type="text" name="patronymic" id="patronymic">
            <label for="role">Роль</label>
            <select name="role" id="role">
                <option value="0">Регистратор медицинский</option>
                <option value="1">Администратор</option>
            </select>
            <label for="login">Логин</label>
            <input type="text" name="login" id="login">
            <label for="password">Пароль</label>
            <input id="password" name="password" type="password">
            <input type="submit" value="Добавить">
        </form>
    </div>
    <h3><?= $message ?? ''; ?></h3>
</div>
