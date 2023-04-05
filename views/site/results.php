<div class="patients-results">
    <?php
    if ($doctors):
        echo "<h3>Результат выборки</h3>";
        echo "<div class='results'>";
            foreach ($doctors as $doctor) {
                echo "<span>" . $doctor->first_name . "</span>";
            }
        echo "</div>";
    endif;
    ?>

    <?php
    if ($patients):
        echo "<h3>Результат выборки</h3>";
        foreach ($patients as $patient) {
            echo "<div class='results'>";
                echo "<h4>" . "Пациент" . "</h4>";
                echo "<span>" . "Имя - " . $patient->first_name . "</span>";
                echo "<span>" . "Диагноз - " . $patient->zxc . "</span>";
            echo "</div>";
        }
    endif;
    ?>

    <?php
    echo "<h3>Результат выборки</h3>";
    echo "<div class='results'>";
        foreach ($diagnoses as $diagnosis) {
            echo "<h4>" . "Индекс диагноза - " . $diagnosis->id_diagnosis . "</h4>";
            echo "<span>" . $diagnosis->diagnosis_name . "</span>";
        }
    echo "</div>";
    ?>
</div>