<div class="forms">
    <div class="choose-all-diagnosis">
        <h3>Выбрать все диагнозы</h3>
        <form method="get" action="">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="all-patients">По всем пациентам</label>
            <input type="button" id="all-patients" value="Выбрать">
        </form>
        <form method="get" action="/server-practice/choices/patient-diagnoses">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="patient_diagnoses">По пациенту</label>
            <?php
            echo '<select id="patient_diagnoses" name="id_medcard">';
            foreach ($patients as $patient) {
                echo "<option value=\"$patient->id_medcard\">"
                    . $patient->last_name . ' '
                    . substr($patient->first_name, 0, 1) . '.'
                    . substr($patient->patronymic, 0, 1) .
                    "</option>";
            }
            echo '</select>';
            ?>
            <input type="submit" value="Выбрать">
        </form>
    </div>
    <div class="diagnosis-results">
        <h3>Результат выборки</h3>
        <div class="results">
<!--            --><?php
//            foreach ($patientDiagnoses as $patientDiagnosis) {
//                var_dump($patientDiagnosis);
//                die();
//                echo "<span>" . $patientDiagnosis . "</span>";
//            }
//            ?>
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