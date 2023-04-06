<div class="messages">
    <label><?= $message ?? ''; ?></label>
</div>
<div class="forms">
    <div class="patient-record-form">
        <h3>Записать пациента</h3>
        <form method="post" action="/server-practice/reception/record-patient">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="patient-choice">ФИО пациента</label>
            <?php
            echo '<select id="patient-choice" name="id_medcard">';
            foreach ($full_names as $patient) {
                echo "<option value=\"$patient->id_medcard\">"
                    . $patient->last_name . ' ' . mb_substr($patient->first_name, 0, 1) . '.' . mb_substr($patient->patronymic, 0, 1) . '.' .
                    "</option>";
            }
            echo '</select>';
            ?>
            <label for="doctor-choice">Врач</label>
            <?php
            echo '<select id="doctor-choice" name="id_doctor">';
            foreach ($doctors as $doctor) {
                echo "<option value=\"$doctor->id_doctor\">"
                    . $doctor->last_name . ' ' . mb_substr($doctor->first_name, 0, 1) . '.'
                    . mb_substr($doctor->patronymic, 0, 1) . ' - '
                    . $doctor->specialization_name .
                    "</option>";
            }
            echo '</select>';
            ?>
            <label for="record-date">Дата приема</label>
            <input id="record-date" type="date" name="appointment_date">
            <label for="record-time">Время приема</label>
            <input id="record-time" type="time" name="appointment_time">
            <label for="cabinet">Кабинет</label>
            <?php
            echo '<select id="cabinet" name="id_cabinet">';
            foreach ($cabinets as $cabinet) {
                echo "<option value=\"$cabinet->id_cabinet\">"
                    . $cabinet->cabinet_number .
                    "</option>";
            }
            echo '</select>';
            ?>
            <input type="submit" value="Добавить">
        </form>
    </div>
    <div class="add-patient-form">
        <h3>Добавить пациента</h3>
        <form method="post" enctype="multipart/form-data" action="/server-practice/reception/register-patient">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label for="patient-first-name">Имя</label>
            <input id="patient-first-name" type="text" name="first_name">
            <label for="patient-last-name">Фамилия</label>
            <input id="patient-last-name" type="text" name="last_name">
            <label for="patient-patronymic">Отчество</label>
            <input id="patient-patronymic" type="text" name="patronymic">
            <label for="diagnosis">Диагноз</label>
            <?php
            echo '<select id="diagnosis-choice" name="id_diagnosis">';
            foreach ($diagnoses as $diagnosis) {
                echo "<option value=\"$diagnosis->id_diagnosis\">"
                    . $diagnosis->diagnosis_name .
                    "</option>";
            }
            echo '</select>';
            ?>
            <label for="patient-medcard">Фото медкарты</label>
            <input id="patient-medcard" type="file" name="medcard_photo">
            <label for="patient-birth-date">Дата рождения</label>
            <input id="patient-birth-date" type="date" name="date_of_birth">
            <input type="submit" value="Добавить">
        </form>
    </div>
</div>