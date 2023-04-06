<div class="forms">
    <div class="choose-all-diagnosis">
        <h3>Выбрать все диагнозы</h3>
        <form method="get" action="/server-practice/all-diagnoses">
            <label for="all-patients">Все диагнозы</label>
            <input type="submit" id="all-patients" value="Выбрать">
        </form>
        <form method="get" action="/server-practice/patient-diagnoses">
            <label for="patient_diagnoses">По пациенту</label>
            <?php
            echo '<select id="patient_diagnoses" name="id_medcard">';
            foreach ($patients as $patient) {
                echo "<option value=\"$patient->id_medcard\">"
                    . $patient->last_name . ' '
                    . mb_substr($patient->first_name, 0, 1) . '.'
                    . mb_substr($patient->patronymic, 0, 1) .
                    "</option>";
            }
            echo '</select>';
            ?>
            <input type="submit" value="Выбрать">
        </form>
    </div>
    <div class="choose-all-patients">
        <h3>Выбрать всех пациентов</h3>
        <form action="/server-practice/all-patients" method="get">
            <label for="doctor-record">Врач, к которому запись</label>
            <?php
            echo '<select id="patient_diagnoses" name="id_doctor">';
            foreach ($allDoctors as $doctor) {
                echo "<option value=\"$doctor->id_doctor\">"
                    . $doctor->last_name . ' '
                    . mb_substr($doctor->first_name, 0, 1) . '.'
                    . mb_substr($doctor->patronymic, 0, 1) .
                    "</option>";
            }
            echo '</select>';
            ?>
            <label for="record-date">Дата записи</label>
            <input id="record-date" type="date">
            <?php
            echo "<select id='record-date'>";
            foreach ($dates as $date) {
                echo "<option value=''>" .
                    "</option>";
            }
            echo "</select>";
            ?>


            <input type="submit" value="Выбрать">
        </form>
    </div>
    <div class="choose-all-doctors">
        <h3>Выбрать всех врачей к которым записан пациент</h3>
        <form method="get" action="/server-practice/all-doctors">
            <label for="patient-choice">Пациент</label>
            <?php
            echo '<select id="patient-choice" name="id_medcard">';
            foreach ($patients as $patient) {
                echo "<option value=\"$patient->id_medcard\">"
                    . $patient->last_name . ' '
                    . mb_substr($patient->first_name, 0, 1) . '.'
                    . mb_substr($patient->patronymic, 0, 1) . '</option>';
            }
            echo '</select>';
            ?>
            <input type="submit" value="Выбрать">
        </form>
    </div>
</div>