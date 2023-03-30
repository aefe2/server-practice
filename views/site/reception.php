<div class="messages">
    <label><?= $message ?? ''; ?></label>
</div>
<div class="forms">
    <div class="patient-record-form">
        <h3>Записать пациента</h3>
        <form>
            <label for="patient-choose">Пациент</label>
            <select id="patient-choose">
                <option value="1">Петров Петр Петрович</option>
            </select>
            <label for="record-date">Дата записи</label>
            <input id="record-date" type="date">
            <label for="record-time">Время записи</label>
            <input id="record-time" type="time">
            <label for="doctor-choose">Врач</label>
            <select id="doctor-choose">
                <option value="1">Петров Петр Петрович</option>
            </select>
            <input type="submit" value="Записать">
        </form>
    </div>
    <div class="add-patient-form">
        <h3>Зарегистрировать пациента</h3>
        <form method="post" enctype="multipart/form-data" action="/server-practice/reception/register-patient">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="patient-first-name">Имя</label>
            <input id="patient-first-name" type="text" name="first_name">
            <label for="patient-last-name">Фамилия</label>
            <input id="patient-last-name" type="text" name="last_name">
            <label for="patient-patronymic">Отчество</label>
            <input id="patient-patronymic" type="text" name="patronymic">
            <label for="patient-medcard">Фото медкарты</label>
            <input id="patient-medcard" type="file" name="medcard_photo">
            <label for="patient-birth-date">Дата рождения</label>
            <input id="patient-birth-date" type="date" name="date_of_birth">
            <input type="submit" value="Добавить">
        </form>
    </div>
</div>