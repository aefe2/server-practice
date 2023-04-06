<div class="patients-results">
    <?php
    //Выбрать всех врачей к которым записан пациент
    if (isset($doctors)):
        echo "<h3>Результат выборки</h3>";
        echo "<div class='results'>";
        foreach ($doctors as $doctor) {
            echo "<span>" . "Фамилия - " . $doctor->last_name . "</span>";
            echo "<span>" . "Имя - " . $doctor->first_name . "</span>";
            echo "<span>" . "Отчество - " . $doctor->patronymic . "</span>";
            echo "<span>" . "Дата рождения - " . $doctor->date_of_birth . "</span>";
            echo "<span>" . "Должность - " . $doctor->position . "</span>";
            echo "<span>" . "Специализация - " . $doctor->specialization_name . "</span>";
        }
        echo "</div>";
    endif;
    ?>

    <?php
    //Выбрать все диагнозы По пациенту
    if (isset($patients)):
        echo "<h3>Результат выборки</h3>";
        foreach ($patients as $patient) {
            $omg = $patient->medcard_photo;
            echo "<div class='results'>";
            echo "<span>" . "Фамилия - " . $patient->last_name . "</span>";
            echo "<span>" . "Имя - " . $patient->first_name . "</span>";
            echo "<span>" . "Отчество - " . $patient->patronymic . "</span>";
            echo "<span>" . "Диагноз - " . $patient->zxc . "</span>";
            echo "<span>" . "Медкарта" . "</span>";
            echo "<img height='250px' width='250px' src=/server-practice/public/{$omg} alt='медкарточка'>";
            echo "</div>";
        }
    endif;
    ?>

    <?php
    //Выбрать все диагнозы Все диагнозы
    if (isset($diagnoses)):
        echo "<h3>Результат выборки</h3>";
        echo "<div class='results'>";
        foreach ($diagnoses as $diagnosis) {
            echo "<h4>" . "Индекс диагноза - " . $diagnosis->id_diagnosis . "</h4>";
            echo "<span>" . $diagnosis->diagnosis_name . "</span>";
        }
        echo "</div>";
    endif;
    ?>

    <?php
    //Выбрать всех пациентов

    ?>
</div>