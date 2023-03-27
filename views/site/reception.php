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
</div>