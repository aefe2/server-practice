<div class="forms">
    <div class="choose-all-diagnosis">
        <h3>Выбрать все диагнозы</h3>
        <form>
            <label for="all-patients">По всем пациентам</label>
            <input type="button" id="all-patients" value="Выбрать">
            <label for="patient">По пациенту</label>
            <input id="patient" type="text" placeholder="ФИО пациента">
        </form>
    </div>
    <div class="diagnosis-results">
        <h3>Результат выборки</h3>
        <div class="results">
            <span>Фамилия</span><span>Иванов</span>
            <span>Имя</span> <span>Иван</span>
            <span>Отчество</span> <span>Иванович</span>
            <span>Дата рождения</span> <span>30.05.1990</span>
        </div>
        <div class="results">
            <span>Фамилия</span><span>Иванов</span>
            <span>Имя</span> <span>Иван</span>
            <span>Отчество</span> <span>Иванович</span>
            <span>Дата рождения</span> <span>30.05.1990</span>
        </div>
    </div>
    <div class="choose-all-patients">
        <h3>Выбрать всех пациентов</h3>
        <form>
            <label for="doctor-record">Врач, к которому запись</label>
            <select id="doctor-record">
                <option value="1">Иванов Иван Иванович</option>
                <option value="2">Петров Петр Петрович</option>
            </select>
            <label for="record-date">Дата записи</label>
            <input id="record-date" type="date">
            <input type="submit" value="Выбрать">
        </form>
    </div>
    <div class="patients-results">
        <h3>Результат выборки</h3>
        <div class="results">
            <span>Фамилия</span><span>Иванов</span>
            <span>Имя</span> <span>Иван</span>
            <span>Отчество</span> <span>Иванович</span>
            <span>Дата рождения</span> <span>30.05.1990</span>
        </div>
        <div class="results">
            <span>Фамилия</span><span>Иванов</span>
            <span>Имя</span> <span>Иван</span>
            <span>Отчество</span> <span>Иванович</span>
            <span>Дата рождения</span> <span>30.05.1990</span>
        </div>
    </div>
    <div class="choose-all-doctors">
        <h3>Выбрать всех врачей к которым записан пациент</h3>
        <form>
            <label for="patient-choice">Пациент</label>
            <select id="patient-choice">
                <option value="1">Иванов Иван Иванович</option>
            </select>
            <input type="submit" value="Выбрать">
        </form>
    </div>
    <div class="patients-results">
        <h3>Результат выборки</h3>
        <div class="results">
            <span>Фамилия</span><span>Иванов</span>
            <span>Имя</span> <span>Иван</span>
            <span>Отчество</span> <span>Иванович</span>
            <span>Дата рождения</span> <span>30.05.1990</span>
        </div>
        <div class="results">
            <span>Фамилия</span><span>Иванов</span>
            <span>Имя</span> <span>Иван</span>
            <span>Отчество</span> <span>Иванович</span>
            <span>Дата рождения</span> <span>30.05.1990</span>
            <span>Должность</span> <span>Кто то там</span>
            <span>Специализация</span> <span>Что то там</span>
        </div>
    </div>
</div>