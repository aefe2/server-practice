<div class="forms">
    <div class="choose-all-diagnosis">
        <h3>Выбрать все диагнозы</h3>
        <form method="get" action="/server-practice/all-diagnoses">
            <label for="all-patients">Все диагнозы</label>
            <input type="submit" id="all-patients" value="Выбрать">
        </form>
        <form style="margin-top: 10px;" method="get" action="/server-practice/patient-diagnoses">
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
            <input class="btn-center" type="submit" value="Выбрать">
        </form>
    </div>
    <div class="choose-all-patients">
        <h3>Выбрать всех пациентов записанных к определенному врачу на определенную дату</h3>
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
            <?php
            echo "<select id='record-date'>";
            foreach ($appointment_date as $date) {
                echo "<option value=\'$date->appointment_date\'>"
                    . $date->appointment_date . ' / '
                    . $date->appointment_time . "</option>";
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
<style>
    .btn-center {
        background: black;
        color: white;
        margin: 10px auto;
        grid-column: 1/3;
        grid-row: 7/8;
    }

    input[type=submit] {
        background: black;
        color: white;
    }

    input[type=submit]:hover {
        transition: .1s;
        background: white;
        color: black;
    }
</style>