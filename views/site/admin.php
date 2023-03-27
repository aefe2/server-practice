<div class="forms">
    <div class="add-doctor-form">
        <h3>Добавить врача</h3>
        <form>
            <label for="doctor-last-name">Фамилия</label>
            <input id="doctor-last-name" type="text">
            <label for="doctor-first-name">Имя</label>
            <input id="doctor-first-name" type="text">
            <label for="doctor-patronymic">Отчество</label>
            <input id="doctor-patronymic" type="text">
            <label for="doctor-birth-date">Дата рождения</label>
            <input id="doctor-birth-date" type="date">
            <label for="doctor-position">Должность</label>
            <input id="doctor-position" type="text">
            <label for="doctor-specialization">Специализация</label>
            <select id="doctor-specialization">
                <option value="1">Хирург</option>
                <option value="2">Терапевт</option>
            </select>
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
            <select id="patient-choice">
                <option value="1">Иванов Иван Иванович</option>
                <option value="2">Петров Петр Петрович</option>
            </select>
            <label for="record-date">Дата приема</label>
            <input id="record-date" type="date">
            <label for="record-time">Время приема</label>
            <input id="record-time" type="time">
            <input type="submit" value="Добавить">
        </form>
    </div>
</div>
