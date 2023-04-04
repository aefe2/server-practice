<div class="patients-results">
    <h3>Результат выборки</h3>
    <div class="results">
        <?php
        foreach ($doctors as $doctor) {
            echo "<span>" . $doctor->first_name . "</span>";
        }
        ?>
    </div>
    <h3>Результат выборки</h3>
    <?php
    foreach ($patients as $patient) {
        echo "<div class='results'>";
        echo "<h4>" . "Пациент" . "</h4>";
//            echo "<span>" . "Диагноз - " . $patient->diagnosis->diagnosis_name . "</span>";
//            echo "<span>" . "Фамилия - " . $patient->last_name . "</span>";
        echo "<span>" . "Имя - " . $patient->first_name . "</span>";
        echo "<span>" . "Диагноз - " . $patient->zxc . "</span>";
//            echo "<span>" . "Отчество - " . $patient->patronymic . "</span>";
        echo "</div>";
    }
    ?>
</div>