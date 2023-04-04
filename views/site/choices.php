<div class="forms">
    <div class="choose-all-diagnosis">
        <h3>Выбрать все диагнозы</h3>
        <form method="get" action="">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="all-patients">По всем пациентам</label>
            <input type="button" id="all-patients" value="Выбрать">
        </form>
        <form method="get" action="/server-practice/patient-diagnoses">
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
    <div class="choose-all-patients">
        <h3>Выбрать всех пациентов</h3>
        <form action="/server-practice/choices/all-patients" method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="doctor-record">Врач, к которому запись</label>
            <?php
            echo '<select id="patient_diagnoses" name="id_doctor">';
            foreach ($allDoctors as $doctor) {
                echo "<option value=\"$doctor->id_doctor\">"
                    . $doctor->last_name . ' '
                    . substr($doctor->first_name, 0, 1) . '.'
                    . substr($doctor->patronymic, 0, 1) .
                    "</option>";
            }
            echo '</select>';
            ?>
            <label for="record-date">Дата записи</label>
            <input id="record-date" type="date">
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
                    . substr($patient->first_name, 0, 1) . '.'
                    . substr($patient->patronymic, 0, 1) . '</option>';
            }
            echo '</select>';
            ?>
            <input type="submit" value="Выбрать">
        </form>
    </div>
</div>